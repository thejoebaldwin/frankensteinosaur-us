---
author: admin
comments: true
date: 2011-12-31 13:18:19
layout: post
slug: test
title: Membership.GetUser in SharePoint 2010 - Not Implemented
wordpress_id: 277
categories:
- SharePoint 2010
---

SharePoint 2010 will give you a "not implemented" error if you try to use Membership.GetUser() to get the currently logged in user via FBA. I've been using the following as a workaround. Inspired by [The SharePoint Cowboy](http://www.binarywave.com/blogs/eshupps/Lists/Posts/Post.aspx?List=89cbe813-99f7-4257-a23a-5fefc377336b&ID=244&Web=c7893495-be3b-4d73-9875-28b039760651)
[csharp]
  public static MembershipUser getUser()
        {
            //not passing in SPWeb because we need the current user. 
            string username = SPContext.Current.Web.CurrentUser.LoginName;
            string[] arrTempString = username.Split('|');
            
            if (arrTempString.Length > 0)
            {
                //get the last string delimited by |
                username = arrTempString[arrTempString.Length - 1];
            }

            MembershipUserCollection collMembership = Membership.GetAllUsers();
            MembershipUser currentUser = null;
            foreach (MembershipUser user in collMembership)
            {
                if (user.UserName == username)
                {
                    currentUser = user;
                    break;
                }
            }
            return currentUser;
        }
[/csharp] 
