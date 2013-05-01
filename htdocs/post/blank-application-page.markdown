---
author: admin
comments: true
date: 2011-09-19 18:00:35
layout: post
slug: blank-application-page
title: SharePoint Blank Application Page
wordpress_id: 228
categories:
- Customization
- SharePoint 2010
---

I like to use Application Pages when doing proof-of-concepts or to do some quick-and-dirty access to the object model, and like to use this as a good starting point. It's for SharePoint 2010 and SharePoint Foundation 2010  (won't work with WSS 3.0 or MOSS 2007, although the theory will) and is an application page with all the functionality stripped out of it. Drop it in your _layouts folder (I like to create a Utilities folder) and code away. Warning - SharePoint is not very forgiving on compile-time errors so if you're going to do in-line coding watch out for the "unknown error"message... that usually means you have a syntax error in your code.  You can download the file [here](/resources/applicationpage/blank.aspx)... do a right-click save as on the link.


![](/resources/applicationpage/blank.png)
