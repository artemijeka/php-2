<?php

class Autoload
{
    public static function autoloadClass($class)
    {
        include_once 'model/' . $class . 'class.php';
        include_once 'controller/' . $class . 'class.php';
    }
}

spl_autoload_register('Autoload::autoloadClass');