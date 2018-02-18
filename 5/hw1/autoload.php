<?php
/**
 * Конфиг.
 * Загружаем все классы.
 * Твиг.
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
require_once 'cofig.php';

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

require_once 'lib/vendor/twig/autoloader.php'; // Твиг подгружаем.
$loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
$twig = new Twig_Environment($loader); // Регистрируем твиг.
// Пример работы с твигом: 
//    $template = $twig -> loadTemplate('index.twig');

//    echo $template -> render( array(
//      'data' => $data,
//      'page' => $page
//    ));