<?php

/* paging.html.twig */
class __TwigTemplate_3cada59a1ab9b372a502a1aba724dc10 extends Twig_Template
{
    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "    ";
        if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
        if (($_action_ != "post")) {
            // line 2
            echo "    <div class=\"grid_19 btn-group\" style='text-align:left; margin-top:20px;margin-bottom:20px;'  >
            ";
            // line 3
            if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
            if (($this->getAttribute($_page_, "start_page") > 1)) {
                // line 4
                echo "                 ";
                if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                if (($_action_ == "/")) {
                    // line 5
                    echo "                    <a class='btn' href='/";
                    if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                    echo twig_escape_filter($this->env, ($this->getAttribute($_page_, "current_page") - 1), "html", null, true);
                    echo "'>&#171;</a>
                ";
                } else {
                    // line 7
                    echo "                   <a class='btn' href='/";
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    echo twig_escape_filter($this->env, $_action_, "html", null, true);
                    echo "/";
                    if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                    echo twig_escape_filter($this->env, ($this->getAttribute($_page_, "current_page") - 1), "html", null, true);
                    echo "'>&#171;</a>
                ";
                }
                // line 9
                echo "            ";
            }
            // line 10
            echo "            ";
            if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range($this->getAttribute($_page_, "start_page"), $this->getAttribute($_page_, "end_page")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 11
                echo "            ";
                if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                if (($_i_ == $this->getAttribute($_page_, "current_page"))) {
                    // line 12
                    echo "                ";
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    if (($_action_ == "/")) {
                        // line 13
                        echo "                    <a class='btn btn-info' href='/";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                        echo "'>";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                        echo "</a>
                ";
                    } else {
                        // line 15
                        echo "                   <a class='btn btn-info' href='/";
                        if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                        echo twig_escape_filter($this->env, $_action_, "html", null, true);
                        echo "/";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, ($_i_ + 1), "html", null, true);
                        echo "'>";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, ($_i_ + 1), "html", null, true);
                        echo "</a>
                ";
                    }
                    // line 17
                    echo "            ";
                } else {
                    echo "    
                ";
                    // line 18
                    if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                    if (($_action_ == "/")) {
                        // line 19
                        echo "                    <a class='btn' href='/";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                        echo "'>";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, $_i_, "html", null, true);
                        echo "</a>
                ";
                    } else {
                        // line 21
                        echo "                   <a class='btn' href='/";
                        if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                        echo twig_escape_filter($this->env, $_action_, "html", null, true);
                        echo "/";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, ($_i_ + 1), "html", null, true);
                        echo "'>";
                        if (isset($context["i"])) { $_i_ = $context["i"]; } else { $_i_ = null; }
                        echo twig_escape_filter($this->env, ($_i_ + 1), "html", null, true);
                        echo "</a>
                ";
                    }
                    // line 22
                    echo " 
            ";
                }
                // line 24
                echo "            ";
                if (isset($context["loop"])) { $_loop_ = $context["loop"]; } else { $_loop_ = null; }
                if ($this->getAttribute($_loop_, "last")) {
                    // line 25
                    echo "                ";
                    if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                    if (($this->getAttribute($_page_, "page_count") > 1)) {
                        // line 26
                        echo "                    ";
                        if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                        if (($this->getAttribute($_page_, "end_page") != ($this->getAttribute($_page_, "page_count") - 1))) {
                            // line 27
                            echo "                        ";
                            if (isset($context["action"])) { $_action_ = $context["action"]; } else { $_action_ = null; }
                            if (($_action_ == "/")) {
                                // line 28
                                echo "                            <a class='btn' href='/";
                                if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                                echo twig_escape_filter($this->env, ($this->getAttribute($_page_, "current_page") + 1), "html", null, true);
                                echo "'>&#187;</a>
                        ";
                            } else {
                                // line 30
                                echo "                           <a class='btn' href='/";
                                if (isset($context["page"])) { $_page_ = $context["page"]; } else { $_page_ = null; }
                                echo twig_escape_filter($this->env, ($this->getAttribute($_page_, "current_page") + 1), "html", null, true);
                                echo "'>&#187;</a>
                        ";
                            }
                            // line 32
                            echo "                    ";
                        }
                        // line 33
                        echo "                ";
                    }
                    // line 34
                    echo "            ";
                }
                // line 35
                echo "           ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 36
            echo "      </div>
     ";
        }
    }

    public function getTemplateName()
    {
        return "paging.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }
}
