<?php

/* main/content.html.twig */
class __TwigTemplate_dc7b1d0e8fc997963d37d447295eeede extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo " <div id=\"content\" class=\"content\">
     <div>
        <h1>";
        // line 6
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_post_, "title"), "html", null, true);
        echo "</h1>
        ";
        // line 7
        if (isset($context["html"])) { $_html_ = $context["html"]; } else { $_html_ = null; }
        echo $_html_;
        echo "
        <div>
          ";
        // line 9
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_post_, "tags"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 10
            echo "              <a href='/tag/";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "'>";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "</a> |
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "            
        </div>
     </div>
 </div> 

";
    }

    public function getTemplateName()
    {
        return "main/content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
