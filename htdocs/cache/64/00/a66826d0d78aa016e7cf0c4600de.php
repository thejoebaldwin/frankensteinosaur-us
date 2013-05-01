<?php

/* base.html.twig */
class __TwigTemplate_6400a66826d0d78aa016e7cf0c4600de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<!--[if lt IE 7]> <html class=\"no-js lt-ie9 lt-ie8 lt-ie7\" lang=\"en\"> <![endif]-->
<!--[if IE 7]>    <html class=\"no-js lt-ie9 lt-ie8\" lang=\"en\"> <![endif]-->
<!--[if IE 8]>    <html class=\"no-js lt-ie9\" lang=\"en\"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"en\"> <!--<![endif]-->
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
  <title>Frankensteinosaur.us</title>
  <meta name=\"description\" content=\"\">
  <meta name=\"viewport\" content=\"width=device-width\">
 
<link rel=\"stylesheet\" href=\"/css/reset.css\" />
<link rel=\"stylesheet\" href=\"/css/text.css\" />
<link rel=\"stylesheet\" href=\"/css/960_24_col.css\" />


 <link rel=\"stylesheet\" href=\"/css/style.css\" />
</head>
<body>
 <header>

  </header>
<div class=\"container_24\">
<div class=\"grid_5\" id=\"left\">
\t\t<div class='name' id='h'><a href='/'>Joe Baldwin</a></div>
  \t\t       <ul>  
\t\t          <li><a href='#'>Tag 1</a></li>
\t\t          <li><a href='#'>Tag 2</a></li>
\t\t          <li><a href='#'>Tag 3</a></li>
\t\t      </ul>  </div>
  <!-- end .grid_5 -->
  <div class=\"grid_19\" class='text-align:left;' >
       ";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 39
        echo "    </div>
  <!-- end .grid_19 -->
  <div class=\"clear\"></div>
</div>

  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href=\"http://browsehappy.com/\">Upgrade to a different browser</a> or <a href=\"http://www.google.com/chromeframe/?redirect=true\">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
 



  <footer>

  </footer>
 <script type=\"text/javascript\"> 
var gaJsHost = ((\"https:\" == document.location.protocol) ? \"https://ssl.\" : \"http://www.\");
document.write(unescape(\"%3Cscript src='\" + gaJsHost + \"google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E\"));
</script> 
<script type=\"text/javascript\"> 
try {
var pageTracker = _gat._getTracker(\"UA-7711572-6\");
pageTracker._trackPageview();
} catch(err) {}</script> 
</body>
</html>";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
        // line 35
        echo "        <div id=\"content\">
            Content of the page...
        </div>
      ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

}
