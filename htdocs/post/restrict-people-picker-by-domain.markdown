---
author: Joe-Baldwin
comments: true
date: 2010-03-17 20:43:18
layout: post
slug: restrict-people-picker-by-domain
title: Setproperty Web Application Not Found on PeoplePicker Domain Restriction
wordpress_id: 59
categories:
- Configuration
- MOSS 2007
tags:
- multiple domains
- peoplepicker
- STSADM
---

I ran into an issue recently where the Active Directory forest contained several domains, but the SharePoint site needed to be available to users belonging to a specific domain, which we shall refer to as DomainX.com, DomainY.com and DomainZ.com.  The profile import was set to only import profiles for users of DomainX.com and only DomainX.com users were given access to the SharePoint site. However, when searching for users from within a PeopleEditor control (aka People Picker) users from DomainY.com and DomainZ.com were being pulled in. To give scope to the problem, DomainX had 15000 users alone, so searching for "Joe" for example, was pulling in close to a hundred results across all domains. The reason for this is that the PeoplePicker searches all AD accounts that are accessible in the entire AD forest. To restrict this, you have to use the STSADM utility.

I initially ran the command stsadm -o setproperty -pn "peoplepicker-onlysearchwithinsitecollection" -pv  "Yes" -url "http://sharepointserver", where "sharepointserver" is the server name, not the host header url that you use to get to it (very important!). This set my PeoplePicker to only search within users that exist within that site collection (any user in the "All People" group in site settings.). This is really only useful if you have all your users you will ever need _already added to your site collection_. I also needed to duplicate this on my MySites, which share the same front end servers as my portal site. Running the above command did not restrict the PeoplePicker for the MySites as I would have expected it to, so I ran the same command as above, substituting the server name for my root MySite url, and received a "Web Application at http://mysite could not be found" message, with some suggestions that I check my alternate access mappings. I tried changing some of the mappings to give my MySite web application some entry point for the STSADM command to work but no luck.

Eventually I found a forum post where it was suggested that I extend an existing site collection, and try running the same command against the new url. I did so and went with a non-standard port (standard is 80), and tried running the command again and it worked! I believe the STSADM cannot differentiate between site collections through host headers (but can through port numbers).

Back to the less than ideal solution of the "setproperty peoplepicker-onlysearchwithinsitecollection". There is another STSADM command, "setsiteuseraccountdirectorypath" that allows you to set an LDAP path for the PeoplePicker results. You also have to run this for each MySite, as running it at the root MySite will not propagate through to the personal sites.

Here's the command I used to restrict users by Domain, for the MySite that had the extended web application: "Stsadm -o setsiteuseraccountdirectorypath -url http://mysite:1010/personal/joebaldwin  -path "DC=DomainX,DC=com"

Via [Joe Oleson's Blog](http://blogs.msdn.com/joelo/archive/2007/01/18/multi-forest-cross-forest-people-picker-peoplepicker-searchadcustomquery.aspx) and [Social.Technet.Microsoft.Com](http://social.technet.microsoft.com/Forums/en-US/sharepointadmin/thread/a6bd1100-06d1-42a1-999c-55db856d562c)
