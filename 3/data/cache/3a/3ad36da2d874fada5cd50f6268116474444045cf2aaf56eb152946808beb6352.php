<?php

/* head.tmpl */
class __TwigTemplate_b73cf599e3a2baaf6b1f6749e57e52af48cc21b8d82be64dd7ae7140a954573b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<title>";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
<meta charset=\"UTF-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";
    }

    public function getTemplateName()
    {
        return "head.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "head.tmpl", "/home/artem/Dropbox/WebMaster/GeekBrains/php-2/php-2.loc/3/views/head.tmpl");
    }
}
