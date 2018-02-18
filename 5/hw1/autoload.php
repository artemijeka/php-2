<?php
/**
 * @title Загружает все классы.
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
spl_autoload_register('autoloadClass'); // Вызов метода загрузки всех классов.

function autoloadClass($class)
{
    if (include_once 'm/' . $class . '.class.php') {
        return true;
    } elseif (include_once 'c/' . $class . '.class.php') {
        return true;
    } else {
        return false;
    }
}



