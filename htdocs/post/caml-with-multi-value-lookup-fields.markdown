---
author: Joe-Baldwin
comments: true
date: 2008-02-27 11:34:58
layout: post
slug: caml-with-multi-value-lookup-fields
title: CAML with Multi-Value Lookup Fields
wordpress_id: 28
categories:
- Customization
tags:
- CAML
---

When using the WSS 3.0 Web Services to access your lists, you might have a list that contains a Multi-Value Lookup Field; that is to say, a Lookup Field that has the "Allow Multiple Values" option checked. These types of fields are a bit shaky in SharePoint, although some quirks have been addressed in the recent [Service Pack 1](http://www.microsoft.com/downloads/details.aspx?FamilyId=4191A531-A2E9-45E4-B71E-5B0B17108BD2&displaylang=en) upgrade. A regular CAML query to insert a new item would look something like this:

<Method ID="1" Cmd="New"> 

<Field Name="FirstName">John</Field>

<Field Name="LastName">Doe</Field> 

<Field Name="Email">johndoe@johndoe.com</Field>

</Method> 

So now you want a field where the user can select multiple items, and these items are populated from another list. Let's say there is a section on a form that allows a user to sign-up for multiple mailing lists. On the back-end these would be managed in their own list, "Mailing Topic", and would be the source for our lookup column. We will call the lookup column "My Subscriptions". Here is the contents of our "Mailing Topic" list: ID Topic Name 1 New Hires 2 Promotions 3 Leaving We will submit the same CAML, but with the new field added and all three options included: 

<Method ID="1" Cmd="New">

<Field Name="FirstName">John</Field> 

<Field Name="LastName">Doe</Field>

<Field Name="Email">johndoe@johndoe.com</Field> <Field Name="MySubscriptions"> 1;#New Hires;#2;#Promotions;#3;#Leaving </Field>

</Method> 

The format is: ID;#Lookup Field Value. Separate additional values by ";#". If you look in the list with the lookup column after a successful submission, you will see all the items, but minus the ;#ID's and delineated with a comma instead.
