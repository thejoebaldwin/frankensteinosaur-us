---
author: Joe-Baldwin
comments: true
date: 2009-03-26 11:27:20
layout: post
slug: twitter-workflow-as-sharepoint-middleware
title: Twitter Workflow as SharePoint Middleware
wordpress_id: 12
categories:
- Workflow
tags:
- Middleware
- Twitter
---

First off, let me address the fact that this post is about Twitter. Well, it's about Twitter AND SharePoint if you want to get picky. But ok, it's about Twitter, the one that's always in the news and is very trendy right now. I think it's great; I've learned a ton about SharePoint since I've started following some great SharePoint experts that I found out on [WeFollow.Com](http://wefollow.com/tag/sharepoint).




What problems can Twitter solve with SharePoint? For one, it provides a platform to share out data that might be behind a corporate intranet, or existing within a secured SharePoint site. Every list in SharePoint has a corresponding RSS feed, but they are next to useless because of protected content issues. We can use Twitter as [middleware ](http://en.wikipedia.org/wiki/Middleware)to push out information about our content as it happens. In a sense it is doing what email notifications on a list are, but if there is a #1 complaint I hear from people is that they are absolutely swamped with email.... do they really need another email from a SharePoint site? On top of that...it is from an automated source that means they don't need to respond and are less than likely to read it. This illustrates the concept of having users _pull_ the data instead of having it _pushed_ on them. Furthermore, this is superior to the RSS feeds in SharePoint because you could have multiple workflows on multiple document libraries pushing out data to the same Twitter account; almost a site-wide RSS feed.




So now you're saying, "So you expect everyone in the company to sign up for a twitter account?" No. Twitter has a RSS feed for each public facing account. This could be pulled in by a widget on your non-SP intranet, it could be pulled in by an RSS Reader Webpart, it could be rendered using XSLT. If you have employees who do have twitter accounts, then they could 'Follow' that account as well, or have the workflow post directly to their own account if they wished.




On to the workflow, the "CheepFlow", as I call it. I know, awesome name. When adding the workflow to a list, you are presented an association form where you enter: The Twitter account name, the account password, a [Bit.Ly](http://bit.ly/) username, and a Bit.Ly api key. This is to shorten the urls that come out of sharepoint, which can get pretty long. Provided you check the 'Start this workflow when a new item is created', when a new document is uploaded, the workflow will "Tweet" an update with the name of the document, the name of the document library, and the shortened url to access it. I set up an account for the sake of this project, you can see it [here](http://twitter.com/cheepflow). The links won't work because they all go to "localhost" :)




I created a project at CodePlex to host the code at [http://cheepflow.codeplex.com](http://cheepflow.codeplex.com/), please check there for any updates! Credit goes to the team over at [Yedda](http://devblog.yedda.com/) for the [C# Twitter Wrapper](http://devblog.yedda.com/index.php/2007/05/16/twitter-c-library/). If you have any comments or questions I would love to hear them!
