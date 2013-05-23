
Recently at a client there was a need to export multiple spreadsheets of a list, but each with a different filter. For one or two filters, the easy solution would be to create a different view for each filter of the list, navigate to that view and click on the "Export to Spreadsheet" option. When you go past four or more, it quickly becomes tedious, especially when these spreadsheets are meant to be as current as possible. My first solution to this was to add a Link Webpart to a page, and each link would export one of the views of the list. You can read about how to format the link a spreadsheet export link [here](http://weblogs.asp.net/wkriebel/archive/2005/08/22/LinkToExportToSpreadsheet.aspx). Although it was much easier for the user to generate these spreadsheets now that they were all in one place, it required a great deal of additional knowledge to maintain, in that the GUIDs for the view and the list need to be determined and added to the link.




So what next? Turns out, this is a perfect fit for a Custom Field Type! Specifically, an extended SPFieldMultiColumn. Why the Multi-column? We use the Multi-column so that the generated link will look nice and hide the user-scaring querystring in the spreadsheet url. For more in-depth coding and configuration of a custom field type read [here](http://www.sharethispoint.com/archive/2006/08/07/23.aspx).




Here's the code in vb (for all you out there that don't like the above referenced c# example)






  * [ViewSpreadsheetField.vb](http://sharepointjoe.googlepages.com/ViewSpreadsheetField.vb)


  * [ViewSpreadsheetFieldControl.ascx](http://sharepointjoe.googlepages.com/ViewSpreadsheetFieldControl.ascx)


  * [ViewSpreadsheetFieldControl.vb](http://sharepointjoe.googlepages.com/ViewSpreadsheetFieldControl.vb)


  * [FLDTYPES_SpreadsheetLink.xml](http://sharepointjoe.googlepages.com/FLDTYPES_SpreadsheetLink.xml)




Here is where the magic really happens:




Public Function GetViewLink(ByVal columnViewKey As String) As LinkValue Dim targetListGUID As System.Guid = SPContext.Current.List.Lists(TargetList).ID Dim fieldValue As String = SPContext.Current.Item(columnViewKey).ToString() Dim viewGUID As System.Guid = SPContext.Current.List.Lists(TargetList).Views(fieldValue).ID Dim sbLink As New StringBuilder sbLink.AppendFormat("/_vti_bin/owssvr.dll?CS=109&Using=_layouts/query.iqy&List={0}{1}{2}", _ "{", targetListGUID.ToString, "}") sbLink.AppendFormat("&View={0}{1}{2}&CacheControl=1", _ "{", viewGUID.ToString, "}") Dim tempLink As LinkValue = New LinkValue tempLink.Description = fieldValue & " - View" tempLink.Hyperlink = sbLink.ToString Return tempLink End Function




We retrieve the list GUID, and then use that to to retrieve the view GUID. Then we are able to format our link querystring to export the spreadsheet. These values are then extracted in the RenderPattern section in the FLDTypes xml. Make sure you have a good understanding of the LinkValue class, which inherits from the SPFieldMultiColumnValue class. The SPFieldMultiColumn is populated with SPFieldMultiColumnValue's, which is what allows us to use the &lt;Column SubColumnNumber="0" HTMLEncode="TRUE" /> format when it comes to display rendering.




You could add more properties on the LinkValue class for Alt tags, link targets, images, etc. and access them the same way when rendering. In the FLDTypes_SpreadsheetLink.xml there are two custom fields in the PropertySchema, ColumnFilter and TargetList. These are the column in which to use as the view name lookup, and the list that the views exist on, respectively. The user sets these values when creating the column. More on Custom Field Type XML [here](http://msdn2.microsoft.com/en-us/library/ms415141.aspx).




On your SharePoint list, if the view does not exist for the filter, when the item is created, the link field will remain blank. Once the view is created, go back in to edit the item, and the link will appear if the view is named correctly.




Disclaimer: The code and information in this post are for reference purposes only. Please check with relevant best practices and standards before implementing in a business environment.




More Information:






  * [Share This Point: v3 Creating Custom Field Types](http://www.sharethispoint.com/archive/2006/08/07/23.aspx)


  * [MSDN: Custom Field Type Definition](http://msdn2.microsoft.com/en-us/library/ms415141.aspx)


  * [Westin's Technical Log: How To Create a Hyperlink to SharePoint's List Export to Spreadsheet](http://weblogs.asp.net/wkriebel/archive/2005/08/22/LinkToExportToSpreadsheet.aspx)


