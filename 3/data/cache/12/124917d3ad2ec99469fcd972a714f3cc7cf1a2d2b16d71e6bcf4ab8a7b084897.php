<?php

/* main.tmpl */
class __TwigTemplate_28a4d44837b2855365056c3f3b1c43e98bc1f148cc8f78672b1e80055c10785d extends Twig_Template
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
        echo "<!DOCTYPE html>
<html>
    <head>
        ";
        // line 4
        $this->loadTemplate("head.tmpl", "main.tmpl", 4)->display($context);
        // line 5
        echo "    </head>
    <body>
        <h1>It is hw 3/1</h1>
        <h2>Gallery:</h2>
        ";
        // line 9
        $this->loadTemplate("gallery.tmpl", "main.tmpl", 9)->display($context);
        // line 10
        echo "    </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "main.tmpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 10,  32 => 9,  26 => 5,  24 => 4,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "main.tmpl", "/home/artem/Dropbox/WebMaster/GeekBrains/php-2/php-2.loc/3/views/main.tmpl");
    }
}
