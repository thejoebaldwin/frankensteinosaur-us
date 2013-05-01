---
author: Joe-Baldwin
comments: true
date: 2010-01-08 10:48:45
layout: post
slug: sharepoint-single-sign-on-part-ii-authentication
title: 'SharePoint Single Sign-On Part II: Authentication'
wordpress_id: 65
categories:
- MOSS 2007
- Single Sign-On
tags:
- HTTPRequest
- MOSS 2007
- SSO
- Twitter
---

In the last post, I talked about the basics of SharePoint Single Sign-on (SSO). SharePoint SSO out-of-box is really only a secure password store, and will not talk to any of your applications for you (not even with the OWA Web Parts) when it is first configured. Before you read any further in indignation, please read the [previous post](http://joesharepoint.humboldttechgroup.com/post/The-Myth-of-SharePoint-Single-Sign-On.aspx).... I am a big fan of SharePoint SSO now that I've got a couple of applications successfully authenticating against it. This post will demonstrate how you would go about authenticating against an application external to SharePoint. The code, a SharePoint application page to go in your 12 hive _layouts folder, is available [here for download](sso_twitter.zip).

To make this example work, you will need to create an alternate access mapping for your SharePoint site for "sharepoint.twitter.com" or "sso.twitter.com". It doesn't matter what the prefix is, but they need to share a common domain name with the target application, in this case twitter.com. Don't forget to add it to the hosts entry for whatever machine you will be accessing this on. Note: this is not the only way to do this, as it would be a deal-breaker for many organizations to rename their SharePoint sites just for the sake of SSO. I will however, be covering that in a different post, as it builds on the premises stated here and the previous post, and is more advanced.

I'm also not suggesting that SharePoint Single Sign-On into Twitter will have much use for your organization... I am using it as an example to illustrate the basic strategy of authenticating to a site with forms-based authentication. Furthermore, anyone can sign-up for an account and it is accessible by everyone, unless your organization is blocking it.

Before we dig into the code, take a look at the html on the [home page](http://www.twitter.com). Search for the string "session[username_or_email]", and identify the input control that would collect the username and password ("session[password]"), as well as the action of the form post - in this case the form will submit to [https://twitter.com/sessions](https://twitter.com/sessions). There are also two other input controls that will be posted when this form is submitted, "authenticity_token" and "remember_me". Notice that we are looking of name attribute on the input tag, not the id. We know what the values are for username and password, which we will retrieve from sso, and the input "remember_me" isn't important in this scenario, but we will need the "authenticy_token" value in order to retrieve the cookies. We retrieve this token through some screenscraping... if you want to see how this is done then take a look at the code download at the bottom of the page, I won't take up the space by going through it here.

So first, let's build the HTTPRequest object:. Notice we are setting the autoredirect to false. In this case, on a succesfull sign-in twitter will redirect you to your home page, but that page does not issue the authentication cookies that we need... the cookies are actually issue on the form post target, and then you are redirected.


//create httprequest with appropriate headers
private System.Net.HttpWebRequest createRequest(string requestURL, int contentLength)
{
System.Net.HttpWebRequest objRequest = (HttpWebRequest)WebRequest.Create(requestURL);
objRequest.Method = "POST";
objRequest.CookieContainer = new CookieContainer();
objRequest.KeepAlive = true;
objRequest.ContentType = "application/x-www-form-urlencoded";
objRequest.UserAgent = Request.UserAgent;
//we set this to false in this case, so we can retrieve the cookies from the httpresponse. may differ from application to application.
objRequest.AllowAutoRedirect = false;
objRequest.ServicePoint.Expect100Continue = false;
objRequest.ContentLength = contentLength;
return objRequest;
}


We can't add the authentication cookies as-is to the page.response, because they are system.net cookies, and the response object expects cookies to be in httpcookie format. Also, note where we are specifying the domain... this is important if you are running this code from a differnent url than your target app. There is more on this in a previous post, but the short of it is if your sharepoint site is sharepoint.domain.com and you are SSO-ing to webmail.hbs.net, you will have to set the cookie domain to "domain.com"..... sharepoint.domain.com cannot write cookies to the response for webmail.domain.com, but can for the common part of their respective urls. Here's the code to convert the cookies:


//convert standard cookies into format usable by page.response
public HttpCookie cookieToHTTPCookie(System.Net.Cookie oldCookie)
{
HttpCookie newCookie = new HttpCookie(oldCookie.Name, oldCookie.Value);
newCookie.Domain = TWITTER_DOMAIN;
newCookie.Expires = oldCookie.Expires;
newCookie.HttpOnly = oldCookie.HttpOnly;
newCookie.Path = oldCookie.Path;
newCookie.Secure = oldCookie.Secure;
return newCookie;
}


Now we can grab the cookies we need and add them to the client's HTTPResponse. The point of interest in this piece is where we are building the HTTPRequest body; in strPost we are spoofing the inputs that Twitter is expecting from a submit on their login page.


//retrieve authentication cookies after successful httprequest login, add to client response
private void addAuthenticationCookies(string userName, string password, string token)
{
String strPost = "";
userName = HttpUtility.UrlEncode(userName);
password = HttpUtility.UrlEncode(password);
//here's where we pass our credentials. Will be different for every login page, depending on application!
strPost = "authenticity_token=" + token
+ "&session[username_or_email]=" + userName
+ "&session[password]=" + password
+ "&remember_me=1";
StreamWriter myWriter = null;
HttpWebRequest objRequest = createRequest(TWITTER_AUTH_URL, strPost.Length);
myWriter = new StreamWriter(objRequest.GetRequestStream());
myWriter.Write(strPost);
myWriter.Close();
HttpWebResponse objResponse = (HttpWebResponse)objRequest.GetResponse();
HttpCookieCollection myCookies = new HttpCookieCollection();
foreach (Cookie responseCookie in objResponse.Cookies)
{
Response.Cookies.Add(cookieToHTTPCookie(responseCookie));
}
objResponse.Close();
}


Once the cookies are added to the response, just do a Response.Redirect to your target application. Call all of it together in the OnLoad:


ISsoProvider ssoProvider = SsoProviderFactory.GetSsoProvider();
SsoCredentials owaCredentials = ssoProvider.GetCredentials("Twitter");
string username = ConvertSecureStringToString(owaCredentials.UserName);
string password = ConvertSecureStringToString(owaCredentials.Password);
addAuthenticationCookies(username, password, getAuthenticityToken());
Response.Redirect([http://www.twitter.com](http://www.twitter.com));


In my next post on SharePoint Single Sign-On, I will be addressing (and resolving) the issue of the Cookie-Domain name constrictions and will demonstrate how your SharePoint site can be on a completely different domain than the application you are authenticating against. In short, a seamless SSO implementation.
