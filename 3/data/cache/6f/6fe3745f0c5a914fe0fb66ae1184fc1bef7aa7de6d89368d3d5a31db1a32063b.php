<?php

/* main.tmpl */
class __TwigTemplate_6948c9d8c4f986aea618afa37b17ba03f4ea5266dfc318e572cd353b085c53ac extends Twig_Template
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
