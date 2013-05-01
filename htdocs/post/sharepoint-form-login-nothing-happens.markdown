---
author: Joe-Baldwin
comments: true
date: 2009-03-17 11:28:42
layout: post
slug: sharepoint-form-login-nothing-happens
title: SharePoint Form Login Nothing Happens
wordpress_id: 16
categories:
- Configuration
tags:
- FBA
---

Using FBA (Forms-Based Authentication) can be very intimidating, because there are so many interlocking parts, especially if you are using FBA in an extended web application. One problem I have run up against time and time again is after you have everything configured BY THE BOOK, you attempt that first login, hit the 'Sign In' button and nothing happens. The page refreshes, but the username and password fields are empty. Even if you enter the password wrong or a username that doesn't exist, nothing happens! This has to do with the cookies SharePoint is attempting to store. Try your site in Firefox, you should be able to successfully log in.




If this is the case, then you need to add your site to the list of 'Trusted Sites' in your browser. Don't forget to close out your browser before you try to access the site again.
