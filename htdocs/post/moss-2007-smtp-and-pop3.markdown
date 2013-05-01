---
author: Joe-Baldwin
comments: true
date: 2007-05-09 11:35:32
layout: post
slug: moss-2007-smtp-and-pop3
title: MOSS 2007 SMTP and POP3
wordpress_id: 30
categories:
- Configuration
tags:
- Email
- Exchange
- POP3
- SMTP
---

Recently I learned that document libraries can be enabled to receive emails and attachments. Each document library (and some types of lists) can have it's own email address, and within that library rules can be set so as to route the emails and attachments to different folders based on subject line or sender. The mind reels at he possibilities! So, I set out to see it for myself. I came across this excellent whitepaper [here](http://www.combined-knowledge.com/Downloads%202007.htm), outlining the configuration steps on the server and site. Now, if you're like me, your environment is not a dedicated SharePoint server. Amongst the myriad of applications that are running, my server has been configured as a SMTP and POP3 server, which will cause conflict when it comes to enabling your SharePoint sites to receive email. The conflict occurs when the Windows SharePoint Services Timer service attempts to query the mailrootdrop folder. There will never be an email there because the POP3 service grabs the .eml files as soon as they arrive. Attempting to copy these files back into the mailrootdrop directory from their respective mailbox folders OR pointing your incoming email settings to one of the mailboxes instead of the mailrootdrop folder, results in the following application event error to be written to your event log:




"A critical error occurred while processing the incoming e-mail file E:InetpubmailrootdropP3_xxxxxxxxxxxxx. The error was: Bad senders or recipients.."




The reason for this is that the Document Library Email domain and the POP3 domain are the same, causing a conflict over who gets control of the messages. **Solution: Uninstall the POP3 service and add the Document Library Email domain to the SMTP server's domains, OR create a new, differently named domain in the SMTP server's domain, and set that in your Incoming Email configurations.** More Information: [Plan Incoming e-mail (Office SharePoint Server)](http://technet2.microsoft.com/Office/en-us/library/ca092ed2-4aa2-4c2e-b273-661ca6a76e011033.mspx?mfr=true) [Peter's World - MOSS 2007 WSS V3 Incoming Email with Exchange](http://www.peterverster.co.uk/blog/2006/11/29/MOSS+2007+WSS+V3+Email+Configuration+Email+Enabed+Lists+Email+Enabled+Document+Libraries+Using+Exchange+2003.aspx) [Various Other Issues with Configuring Incoming Email](http://suguk.org/blogs/combined_knowledge/archive/2006/06/11/831.aspx)
