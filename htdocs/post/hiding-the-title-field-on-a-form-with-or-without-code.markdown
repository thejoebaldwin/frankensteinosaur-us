---
author: Joe-Baldwin
comments: true
date: 2010-04-26 21:14:14
layout: post
slug: hiding-the-title-field-on-a-form-with-or-without-code
title: Hiding the Title Field on a Form, with or without code
wordpress_id: 92
categories:
- Configuration
- Customization
---

One of the more common questions I run into from SharePoint users is "What do I put in the _Title_ field"? Many of the lists in SharePoint will have a "Title" field, and any custom list you create will have this field by default. So therein lies the question of the architect... what do you do with this field? It's ambiguous by design (I imagine) but at times it can be too ambiguous. Often changing to "Name" or something-title, like "Project Title" or "Department Title" can help enhance usability. What about in situations where Title doesn't make sense at all? If you delete the Title field, you lose the Edit Control Block (context menu) in your views. The best solution is to hide this on your New Item and Edit item forms. To hide this field from the SharePoint interface:



	
  * Go the the list in question -> settings -> list settings.

	
  * Under 'General Settings' click 'Advanced Settings'

	
  * For 'Allow Mangement of Content Types' select 'Yes', click OK.

	
  * There will be a new 'Content Types' section that wasn't there before. Click the 'Item' Content Type.

	
  * Click 'Title' under 'Columns'. Select 'Hidden (Will Not Appear in Forms)'. Click OK.

	
  * Done!


To programmatically hide a SharePoint form field, use the following code (replace "ListName" with your List Name).


Using (SPWeb web = SPContext.Current.Web)




{




web.AllowUnsafeUpdates = true;




SPList list = web.Lists["ListName"];




list.Fields["Title"].Hidden = true;




list.Fields["Title"].Update();




}


There may be occasions where you want to ensure on Site Creation (like in an Event Receiver or a Custom Workflow) where certain lists have these field hidden, or a Custom Action where the user can determine if they want the Title fields hidden on a form and do not want to disturb the ponderings of the local SharePoint wizard.

Original fix found at [stackoverflow.com](http://stackoverflow.com/questions/290322/sharepoint-make-a-list-field-hidden-programmatically)
