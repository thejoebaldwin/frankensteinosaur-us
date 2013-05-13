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
                         <div style=\"color:black;font-size: small;\"> published: ";
            // line 10
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
            // line 11
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
            // line 12
            echo "     </div>
 
 ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 15
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
