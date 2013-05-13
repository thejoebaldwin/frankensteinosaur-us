
This is probably the toughest thing I've run up against yet with SharePoint. I won't share how much time was involved. *shudder*




I was not able to hit the breakpoints I added to my custom workflow in Visual Studio 2005. I attached to the w3wp.exe process s of type "Workflow", I compiled the dll in debug mode, I even made sure the appropriate .pdb resided in the same gac_msil directory as my assembly in the gac. Nothing.




Further frustrating the issue, and at the time unknowingly related, was the fact that once a workflow was initiated on a list item, it would give me the infamous "Failed On Start (Retrying)" error. I couldn't debug my workflow to see why it was failing to start. Argh.




Eventually I found this post [here](http://social.technet.microsoft.com/forums/en-US/sharepointworkflow/thread/36582f53-adca-4723-8699-5d91820ba974/) (Thank you Irfan Bashir!) , which suggested checking the "Policy for Web Application" section under Sharepoint Central Administration -> Application Management. Make sure your App Pool account for your SharePoint site (in my case "Network Service") has Full Control as opposed to just "Full Read". Restart IIS and try debugging your application again! This should get rid of at least any trouble you have hitting your breakpoints in Visual Studio. [](http://social.technet.microsoft.com/forums/en-US/sharepointworkflow/thread/36582f53-adca-4723-8699-5d91820ba974/)
