<?php
/**
 * @title Загружает все классы.
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
spl_autoload_register('autoloadClass'); // Вызов метода загрузки всех классов.

function autoloadClass($className)
{
    $dirs = ['c', 'm'];
    $found = false;
    foreach ($dirs as $dir) {
        $fileName = __DIR__ . '/' . $dir . '/' . $className . '.class.php';
        
        if (is_file($fileName)) {
            require_once($fileName);
            $found = true;
        }
    }
    if (!$found) {
        throw new Exception('Неполучилось загрузить ' . $className);
    }
    return true;
}
//{
//    if (include ("m/" . $className . ".class.php")) {
//        return true;
//    } elseif (include ("c/" . $className . ".class.php")) {
//        return true;
//    } else {
//        return false;
//    }
//}

