<?php

/* head.tmpl */
class __TwigTemplate_fbbf7bb266ca95e18a1567c38685589692fd6acf2b06e64962829e1535bc78db extends Twig_Template
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
        echo twig_escape_filter($this->env, (isset($context["title"]) || array_key_exists("title", $context) ? $context["title"] : (function () { throw new Twig_Error_Runtime('Variable "title" does not exist.', 1, $this->getSourceContext()); })()), "html", null, true);
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
