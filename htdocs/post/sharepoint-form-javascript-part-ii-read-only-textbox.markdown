---
author: Joe-Baldwin
comments: true
date: 2010-04-21 20:45:49
layout: post
slug: sharepoint-form-javascript-part-ii-read-only-textbox
title: 'SharePoint Form Javascript Part II: Read Only Textbox'
wordpress_id: 85
categories:
- Customization
tags:
- Customization Boundary
- Forms
- Javascript
---

You may find yourself with a field that needs to be displayed to the user but you don't want to allow them to edit it. In a workflow situation where an item needs to be approved but you don't want the initial submission modified, this can come in very handy; no code or custom columns required! We'll be building off of [SharePoint Form Javascript Part I](http://www.joesharepoint.com/?p=65), so please take a look at that post for where and how to use this javascript.


function readOnlyTextBox(fieldName)
{




//get the control




var control = getTagFromIdentifierAndTitle("INPUT","TextField",fieldName);




//set readonly to true




control.readOnly = true;




//set the style to look disabled




control.style.color = 'gray';




}










//the workhorse




function getTagFromIdentifierAndTitle(tagName, identifier, title)




{




var len = identifier.length;




var tags = document.getElementsByTagName(tagName);




for (var i=0; i < tags.length; i++)




{




var tempString = tags[i].id;




if (tags[i].title == title && (identifier == "" || tempString.indexOf(identifier) == tempString.length - len))




{




return tags[i];




}




}




return null;




}


Whats left is to call readOnlyTextBox in your main function that you push with the _spBodyOnLoadFunctionNames.push call. More on that [here](http://www.joesharepoint.com/?p=65). So, if you wanted to set the "Title" field to read only,  you would use:

readOnlyTextBox("Title");

in your main javascript function. You can find a slightly different approach on disabling textboxes and other field controls at [Development Dreams: How to disable fields on EditForm.aspx. WSS 3.0 version](http://devdreams.blogspot.com/2007/02/customizing-editformaspx-in-sharepoint.html).
