---
author: Joe-Baldwin
comments: true
date: 2010-03-23 21:09:54
layout: post
slug: sharepoint-edit-form-javascript-part-i-adding-a-form-header
title: 'SharePoint Edit Form Javascript Part I: Adding a Form Header'
wordpress_id: 67
categories:
- Customization
tags:
- Customization Boundary
- Forms
- Javascript
---

Many times as a SharePoint developer you will be faced with deciding whether or not you can use SharePoint out-of-box "customizations" to meet a client need, or if you have to hand-code a Web Part or Application page. I say "customizations", referring to using the SharePoint administrative interface or SharePoint Designer and out-of-box Web Parts, Third Party/Open Source Web Parts, or XSLT. This is often the preferrable route, as those components have been Microsoft-approved or are community-supported. For those more adventurous, delving into custom Web Parts, Event Receivers and Visual Studio Workflows have their place and in some cases, are more straight-forward than the latter.

One of the areas I have run into this "Customization Boundary" is with a simple form. SharePoint lends itself to creating forms with ease; create a column for each of the form fields and you have your form. Simple! Unless the client needs special validation, like "if field A is empty then field B is disabled", or a drop down value will affect the available values in another dropdown. I could go on and on about all the things you can't do in a SharePoint form, but I'd rather start digging into that list and start coming up with the things you can do. I'll even let you in on something: I have yet to find something that I can't do in a SharePoint form once I got over my initial aversion to modifying the Item Edit form.

We'll start with something basic that we will build on in later posts. This code will insert a header row that you can use to separate out areas of your form. We'll be using only javascript (I think that qualifies as within the Customization Boundary). Put this code inside a .js file in your _layouts folder and reference it at the bottom of your Edit.aspx, using SharePoint Designer. The _spBodyOnLoadFunctionNames.Push call will ensure your code gets loaded. The line that is doing the action is the insertHeaderRow call, so replace "New Section Header" with whatever you want your header to say, and make sure you set INSERT_INDEX to whatever row you want the header to show in.


//this adds your function to the list of functions called on page load




_spBodyOnLoadFunctionNames.push("setFields");




function setFields()




{




//row index to insert header




var INSERT_INDEX = 3;




//retrieve html table so we can insert our own row




var newTable = getTagFromIdentifierAndTitle("INPUT", "TextField", "Title").parentNode.parentNode.parentNode.parentNode.parentNode;




insertHeaderRow(newTable, "New Section Header", INSERT_INDEX);




}










function insertHeaderRow(objTable, headerText, index)




{




var newRow = objTable.insertRow(index);




var newCell = newRow.insertCell(0);




newCell.innerText = headerText;




newCell.colSpan = 2;




newCell.className = 'headerCell';




}










//used to get our "Title" field from the form




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


Not so bad, right? Check back for more articles building on this concept, and see if you can think of any "Customization Boundaries" for SharePoint forms that we could tackle. Here is a [list of links I've used](http://delicious.com/baldwinjoe/javascript) to arrive at the above code, and took my SharePoint Javascript inspiration from [Jan Tielens Bloggings](http://weblogs.asp.net/jan/archive/2009/09/04/customizing-the-sharepoint-ecb-with-javascript-part-2.aspx).
