---
author: Joe-Baldwin
comments: true
date: 2009-03-19 11:28:06
layout: post
slug: stsadm-shortcut
title: STSADM Shortcut
wordpress_id: 14
categories:
- Configuration
tags:
- STSADM
---

I think everyone should be able to recite the 12 Hive Path like the pledge of allegiance, but navigating through the file system in explorer or the command shell can be tedious. Use this [batch file](http://baldwinjoe.googlepages.com/stsadm-shell.bat) to open up a command window already in the /12/bin directory. Change the path if your target directory is different! If you don't trust batch files from ol' Uncle (SharePoint) Joe, then save the following line in notepad, and change the extension to .bat




cmd.exe /k cd "C:program filescommon filesmicrosoft sharedweb server extensions12bin"
