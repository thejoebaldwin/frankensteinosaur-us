<?php

/* posts.json.twig */
class __TwigTemplate_0a6b5e3df5654372d43122a25dd318e3 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo " { 
   \"posts\": [
      ";
        // line 3
        if (isset($context["posts"])) { $_posts_ = $context["posts"]; } else { $_posts_ = null; }
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($_posts_);
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
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 4
            echo "            {
            \"title\": \"";
            // line 5
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_post_, "path"), "html", null, true);
            echo "\",
            \"published\": \"blerg\",
            \"contents\": \"";
            // line 7
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo $this->getAttribute($_post_, "contents");
            echo "\",
            \"permalink\": \"http: //frankensteinosaur.us/post/";
            // line 8
            if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
            echo twig_escape_filter($this->env, $this->getAttribute($_post_, "path"), "html", null, true);
            echo "\"
            }
            ";
            // line 10
            if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
            if ((!$this->getAttribute($_loop_, "last"))) {
                echo ",";
            }
            // line 11
            echo "      ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 12
        echo "            ]
}
 
";
    }

    public function getTemplateName()
    {
        return "posts.json.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
