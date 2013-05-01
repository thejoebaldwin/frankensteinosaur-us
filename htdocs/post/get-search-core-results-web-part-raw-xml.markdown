---
author: Joe-Baldwin
comments: true
date: 2010-02-19 21:50:37
layout: post
slug: get-search-core-results-web-part-raw-xml
title: Get Search Core Results Web Part Raw XML
wordpress_id: 53
categories:
- Customization
- Search
tags:
- XSLT
---

I keep using this and can't find the bookmark, so I'll post it here. When using XSLT to [style your results in a Search Core Results Web Part](http://www.zimmergren.net/archive/2008/03/15/moss-2007-customize-the-search-result-using-xslt-part-3-customize-using-sharepoint-designer-2007.aspx), it helps to get the raw XML in static form to fine-tune your visuals. To do so, paste the following into the XSL Editor Property on your Search Core Results Web Part. Hit Apply and you will get the untransformed XML.

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:output method="xml" version="1.0" encoding="UTF-8" indent="yes"/>

<xsl:template match="/">

<xmp>

<xsl:copy-of select="*"/>

</xmp>

</xsl:template>

</xsl:stylesheet>


Via [social.technet.microsoft.com](http://social.technet.microsoft.com/Forums/en-US/sharepointsearch/thread/16a3e471-b6c9-45dd-8b7e-f5c2d22c48b0) and [Tobias Zimmergren](http://www.zimmergren.net/archive/2008/03/15/moss-2007-customize-the-search-result-using-xslt-part-3-customize-using-sharepoint-designer-2007.aspx)
