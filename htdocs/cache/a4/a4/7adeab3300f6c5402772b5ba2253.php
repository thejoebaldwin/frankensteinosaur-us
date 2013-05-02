<?php

/* main/index.html.twig */
class __TwigTemplate_a4a47adeab3300f6c5402772b5ba2253 extends Twig_Template
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
        echo "
    
       ";
        // line 6
        if (isset($context["posts"])) { $_posts_ = $context["posts"]; } else { $_posts_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_posts_);
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 7
            echo "     <div id=\"content\">
   \t\t <h1><a href='/post/";
            // line 8
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_post_, "path"), "html", null, true);
            echo "'>";
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_post_, "title"), "html", null, true);
            echo "</a></h1>
   \t\t    \t\t\t";
            // line 9
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo $this->getAttribute($_post_, "contents");
            echo "
                        <br/>
                            ";
            // line 11
            if (isset($context["tags"])) { $_tags_ = $context["tags"]; } else { $_tags_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($_tags_);
            foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
                // line 12
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
            // line 14
            echo "     </div>
 
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 17
        echo "
";
    }

    public function getTemplateName()
    {
        return "main/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
