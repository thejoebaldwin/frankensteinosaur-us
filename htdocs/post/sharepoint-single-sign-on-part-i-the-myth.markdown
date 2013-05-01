---
author: Joe-Baldwin
comments: true
date: 2009-12-12 10:50:44
layout: post
slug: sharepoint-single-sign-on-part-i-the-myth
title: 'SharePoint Single Sign-On Part I: The Myth'
wordpress_id: 7
categories:
- MOSS 2007
- Single Sign-On
tags:
- MOSS 2007
- SSO
---

Single Sign-On with SharePoint had always been a somewhat mystical subject. I hadn't had any clients request it and there isn't a lot of information on the subject other than the initial configuration of the MOSS Single Sign-On service. When talking about Single Sign-On it was often in the context of the OWA WebParts, and getting inbox and calendar information. Once I found out that the OWA webparts were nothing but glorified iFrames, Single Sign-On grew in both mystery and prestige. Faced with a client that was not satisfied with the OWA WebParts and the desire to not sign in twice to authenticate to Outlook Web Access, I was finally able to pursue my quest for the truth about SharePoint Single Sign On.




The first point that needs to be made clear is that SharePoint Single Sign-On does nothing for you out-of-box; that is to say, it cannot automatically log your users into Outlook Web Access without some work behind the scenes. And I don't mean configuration work... I mean dirty code tricks that are not for the faint of heart. For those with the courage to undertake the task, the rewards at the end are so great, your name will be sung in ballads ringing through the halls of your office for years without end. For the first week or so. The value in Single Sign-On is that your users will not even notice, and the magic and mystery will be preserved.




The second point, and a slightly more uncomfortable one, is that at some point, your users will have to enter their passwords into the Single Sign-On (SSO) system. The first time they hit the part of the site that would use the SSO, they will be directed to a form that will prompt them for passwords to that system. Often this is met by the client with dissatisfaction, as once again, the Myth of Single Sign-On has over-promised them absolutely no prompts, and it falls onto your lap to tell them the contrary. SharePoint cannot possibly know the passwords to their time tracking systems, their point of sales systems, or others. In fact, SharePoint doesn't even know your Domain password that you use to log into your workstation every morning. It only knows who the network says you are, by way of a token, but no password is ever passed to SharePoint other than what is entered into the SSO form the first time. The next inevitable question is "What about when their passwords expire? Do they have to re-enter their passwords every time?" The answer is yes, every time. This is indeed inconvenient, but I will give you this as argument: "How many times do you log in every day to xyz system?" Compare that to their password expiration policy and you will have a nice ratio in favor of the SSO form.




Onto the "dirty code tricks" I promised earlier. Here is the basic code that you will need to get the stored credentials out of the SSO database:







using Microsoft.SharePoint.Portal;  
using Microsoft.SharePoint.Portal.SingleSignon;  
using Microsoft.SharePoint.Portal.SingleSignon.Security;  
  
public static void getCredentials(ref string username, ref string password, string sso_src)  
{  
string strSSOLogonFormUrl = SingleSignonLocator .GetCredentialEntryUrl(sso_src);




//sso_src is the name of your application you gave in the SSO configuration  
try   
{  
ISsoProvider l_oProvider = SsoProviderFactory .GetSsoProvider();  
SsoCredentials l_oCredentials = l_oProvider.GetCredentials(sso_src);   
username = ConvertSecureStringToString(l_oCredentials.UserName);  
password = ConvertSecureStringToString(l_oCredentials.Password);  
}  
catch (SingleSignonException ssoe)  
{  
if (SSOReturnCodes .SSO_E_CREDS_NOT_FOUND == ssoe.LastErrorCode)  
{  
username = "";  
password = "";  
}   
}  
}




public static string ConvertSecureStringToString(System.Security.SecureString pValue)  
{  
IntPtr lValuePointer = IntPtr.Zero;  
string lValueAsString;  
try  
{  
lValuePointer = Marshal.SecureStringToBSTR(pValue);  
lValueAsString = Marshal.PtrToStringBSTR(lValuePointer);  
}  
catch (Exception ex)  
{  
lValueAsString = ex.Message;  
}  
finally  
{  
if (lValuePointer != IntPtr.Zero)  
Marshal.ZeroFreeBSTR(lValuePointer);  
}  
return lValueAsString;  
}







Now comes the part that is best only talked about in the full light of day. Each application that you want to integrate with SSO is going to be a unique challenge, and it is probably not an application that you wrote... so modifying the authentication mechanism is most likely not an option. I want to tell you up front that not all applications are suitable candidates for SSO; if you have the time and resources to create a proof-of-concept completely independent of the SharePoint SSO with canned credentials, I suggest you do so. If your application uses a forms-based login, then you have a fighting chance.




For applications with Forms-based authentication (FBA) You will need to dissect the HTML form and it's post variables that are sent on submit, and spoof that HTTP request with your own credentials that you retreived from SSO. Once authenticated, you need to grab the cookies from the HTTP response, and write the cookies to the users's response cookie collection. Finally, redirect the user's browser to the application, which you are now authenticated against.




Of the utmost importance is the domain in which these authentication cookies are retrieved from and written to in the user's HTTP response. You cannot write a cookie to different domain than the current site's domain. For example, let's say that your SharePoint site url is mysharepoint.com and you are attempting to set up SSO for your webmail at mywebmail.com. Your code would authenticate to mywebmail.com, grab the cookies and write them to the user's browser session and they would be invisible to the application that you want to log into. Why? It was set down long ago (not that long ago) that websites could not read each other's cookies as it was a security flaw that would allow just about anyone access cookies just like these. Your sites need to share a common domain root: mysharepoint.mydomain.com and mywebmail.mydomain.com would allow cookies to be passed back and forth under a *.mydomain.com domain attribute on the cookie. This can sometimes be a deal breaker for existing sites, so I would suggest some magic under the scenes and create an alternate access mapping for your SSO aspx pages, and hide them in an iframe on your SharePoint site. Nobody needs to know, and the legend grows.




Author's note: I'll get some code out shortly to illustrate the retrieval of cookies from the target SSO application and writing them down to the client. The basic premise is that the authentication should happen between the SharePoint server and the desired application you wish to authenticate against, instead of at the client level. This allows you to depend on the strength of your network and your SSL certificates.




Edit: Please see [SharePoint Single Sign-On Part II: Authentication](http://joesharepoint.humboldttechgroup.com/post/SharePoint-Single-Sign-On-Part-II-Authentication.aspx) for an example of retrieving authentication cookies and using them to log in with SharePoint Single Sign-On.




The code above is not originally mine, and I have reduced it's original form for the sake of illustration. Here are some sites + sources that helped me to success: [http://delicious.com/baldwinjoe/SSO](http://delicious.com/baldwinjoe/SSO)
