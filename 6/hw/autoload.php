<?php
/**
 * Загружаем:
 * все классы,
 * конфиг,
 * твиг.
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
require_once 'config.php';

require_once 'lib/vendor/autoload.php';

spl_autoload_register('autoloadClass'); // Вызов функции загрузки всех классов.
/**
 * Функция проходит по папкам c/ и m/ и загружает классы *.class.php
 * 
 * @param string $className
 * @return boolean
 * @throws Неполучилось загрузить класс.
 */
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