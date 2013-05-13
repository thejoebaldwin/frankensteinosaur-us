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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo " <div id=\"content\" class=\"content\">
        <h1>";
        // line 4
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo twig_escape_filter($this->env, $this->getAttribute($_post_, "title"), "html", null, true);
        echo "</h1>
        ";
        // line 5
        if (isset($context["html"])) { $_html_ = $context["html"]; } else { $_html_ = null; }
        echo $_html_;
        echo "
        <div style=\"color:black;font-size: small;margin:0;padding:0;\"> published: ";
        // line 6
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($_post_, "created"), "m/d/y h:m"), "html", null, true);
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        $context["hour"] = twig_date_format_filter($this->env, $this->getAttribute($_post_, "created"), "H");
        if (isset($context["hour"])) { $_hour_ = $context["hour"]; } else { $_hour_ = null; }
        if (($_hour_ > 12)) {
            echo "pm";
        } else {
            echo "am";
        }
        echo "</div>
        tags:";
        // line 7
        if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($_post_, "tags"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            echo "<a href='/tag/";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "'>";
            if (isset($context["tag"])) { $_tag_ = $context["tag"]; } else { $_tag_ = null; }
            echo twig_escape_filter($this->env, $_tag_, "html", null, true);
            echo "</a>";
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ((!$this->getAttribute($_loop_, "last"))) {
                echo ",";
            }
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 8
        echo " </div> 
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
