
When building custom SharePoint event handlers, the compiled dll is installed to the GAC and is referenced by Windows SharePoint Services.... but what if the assembly has custom attributes that require a config file? Let's say for example, that you want to store smtp information to send out emails on a list item change, and it varies from site to site. Where do you put it?




The answer is that it isn't any different than if the assembly was referenced inside of a web application's bin folder. The custom attributes should reside in the web.config file in the SharePoint site web root. If you aren't sure where the directory that is mapped to the Sharepoint Web resides, open up the IIS Manager, right-click your SharePoint Web folder, and select "Open". Now add your custom properties to this web.config file, save your changes and restart IIS. Don't forget to add the configSection for your custom application settings! More Information: [MSDN:configSections Element (General Settings Schema)](http://msdn2.microsoft.com/en-us/library/ms228256.aspx)
