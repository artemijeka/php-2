<?php

$arrayOfPathToImages = array(
    '1' => './data/images/1.jpg',
    '2' => './data/images/2.jpg'
);

try {
    // подгружаем шаблон
    $gallery = $twig->loadTemplate('gallery.tmpl');

    // передаём в шаблон переменные и значения
    // выводим сформированное содержание
    echo $gallery->render(array(
      'arrayOfPathToImages' => $arrayOfPathToImages
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}