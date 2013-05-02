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
            <div>
         
            <a target=\"_blank\" href=\"http://twitter.com/thejoebaldwin\"><img src=\"/images/Twitter-icon.png\"></a>
            <a target=\"_blank\" href=\"http://www.facebook.com/pages/Humboldt-Technology-Group-LLC/89789096791?ref=ts\"><img src=\"/images/FaceBook-icon.png\"></a>
            <a href=\"http://www.linkedin.com/in/thejoebaldwin\" target=\"_blank\"><img src=\"/images/linkedin_32.png\"></a>
            <a href=\"https://plus.google.com/104911077712616064231/posts#104911077712616064231/posts\" target=\"_blank\"><img src=\"/images/google-plus.png\"></a><br/>
            <a href=\"http://www.youtube.com/baldwinjoe1\" target=\"_blank\"><img src=\"/images/youtube.png\"></a>
            <a href=\"http://itunes.apple.com/us/artist/humboldt-technology-group/id427924873\" target=\"_blank\"><img src=\"/images/apps_32.png\"></a>
            <a href=\"http://github.com/thejoebaldwin\" alt=\"Github\"><img src=\"/images/git_32.png\"></a>
         
      
</div>
  \t\t       <ul>  
\t\t           ";
        // line 38
        if (isset($context["tags"])) { $_tags_ = $context["tags"]; } else { $_tags_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_tags_);
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 39
            echo "              <li><a href='/tag/";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "'>";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "</a></li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 41
        echo "\t\t      </ul>  </div>
  <!-- end .grid_5 -->
  <div class=\"grid_19\" class='text-align:left;' >
       <div class=\"grid_19\" style='text-align:right;'  >
           ";
        // line 45
        if (isset($context["previous_index"])) { $_previous_index_ = $context["previous_index"]; } else { $_previous_index_ = null; }
        $context["current_index"] = ($_previous_index_ + 1);
        // line 46
        echo "           ";
        if (isset($context["current_index"])) { $_current_index_ = $context["current_index"]; } else { $_current_index_ = null; }
        $context["range_index"] = ($_current_index_ - 5);
        // line 47
        echo "            ";
        if (isset($context["current_index"])) { $_current_index_ = $context["current_index"]; } else { $_current_index_ = null; }
        if (($_current_index_ < 0)) {
            // line 48
            echo "                ";
            $context["current_index"] = 0;
            // line 49
            echo "           ";
        }
        // line 50
        echo "           ";
        if (isset($context["range_index"])) { $_range_index_ = $context["range_index"]; } else { $_range_index_ = null; }
        if (($_range_index_ < 0)) {
            // line 51
            echo "                ";
            $context["range_index"] = 0;
            // line 52
            echo "           ";
        }
        // line 53
        echo "            ";
        if (isset($context["range_index"])) { $_range_index_ = $context["range_index"]; } else { $_range_index_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range($_range_index_, ($_range_index_ + 10)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 54
            echo "               ";
            if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
            if (($_i_ <= 22)) {
                // line 55
                echo "                  ";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                if (isset($context["current_index"])) { $_current_index_ = $context["current_index"]; } else { $_current_index_ = null; }
                if (($_i_ == $_current_index_)) {
                    // line 56
                    echo "                      <div class=\"grid_1\"  style='text-align:center;border-style:solid;border-color:red;border-width:1px;'>
                  ";
                } else {
                    // line 58
                    echo "                      <div class=\"grid_1\"  style='text-align:center;background-color:red;color:white;'>
                  ";
                }
                // line 60
                echo "                  ";
                if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                if (($_action_ != "/")) {
                    // line 61
                    echo "                          <a href='/";
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    echo twig_escape_filter($this->env, $_action_, "html", null, true);
                    echo "/";
                    if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                    if (($_i_ > 0)) {
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                    }
                    echo "'>";
                    if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                    echo twig_escape_filter($this->env, $_i_, "html", null, true);
                    echo "</a>
                  ";
                } else {
                    // line 63
                    echo "                          <a href='/";
                    if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                    if (($_i_ > 0)) {
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                    }
                    echo "'>";
                    if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                    echo twig_escape_filter($this->env, ($_i_ + 1), "html", null, true);
                    echo "</a>
                  ";
                }
                // line 65
                echo "                     </div>
              ";
            }
            // line 67
            echo "           ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 68
        echo "      </div>
       ";
        // line 69
        $this->displayBlock('content', $context, $blocks);
        // line 74
        echo "
    </div>
  
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

    // line 69
    public function block_content($context, array $blocks = array())
    {
        // line 70
        echo "        <div id=\"content\">
            Content of the page...
        </div>
      ";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
