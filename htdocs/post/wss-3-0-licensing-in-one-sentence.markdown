---
author: Joe-Baldwin
comments: true
date: 2009-03-13 11:29:15
layout: post
slug: wss-3-0-licensing-in-one-sentence
title: WSS 3.0 Licensing in One Sentence
wordpress_id: 18
categories:
- WSS 3.0
tags:
- Licensing
- WSS 3.0
---

I gave my first conference presentation this week at the [Brainstorm 10.0](http://www.onalaska.k12.wi.us/brainstorm/) event in Wisconsin Dells; one of the hooks of the presentation was that if you have Windows Server 2003 (or 2008) running somewhere in your network, then you already own SharePoint.




Sure, it's WSS 3.0 and not MOSS 2007, but if you are not a big shop then it can be tough to justify a purchase like Office SharePoint Server. But it's not really free, is it? What about CALs, and Internet Connector licenses? This part always confused me, to be honest. Turns out I was making it WAY more complicated than it needed to be, so here it is:




_WSS 3.0 usage is directly bound to the licensing of the server it is on._




What this means is that if you have a server that is already hosting internet-facing websites, then you can host WSS 3.0 on that server and have your SharePoint sites internet-facing as well. If you have a server that is internal to your network then your SharePoint access is restricted to the number of CALs that you already have for that server.
