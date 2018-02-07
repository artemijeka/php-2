<?php

// Объявление массива для путей к маленьким изображениям:
$arrayOfPathToMiniImages = array();

// Подключаем модель подсчета файлов:
include_once 'models/count_files.php';

// Подсчет кол-ва файлов в папке изображений:
$countFiles = count_files('data/images/');
// Подключаем модель изменения изображения:
include_once 'models/resize_images.php';

// В цикле обрабатываем папку с изображениями:
for ($i=1; $i<=$countFiles; $i++){
    // Путь к маленькому изображению:
    $miniImage = "data/mini_images/$i" . ".jpg";
    // Путь к большому изображению:
    $image = "data/images/$i" . ".jpg";
    // Уменьшаем изображения:
    resize(400, $miniImage, $image); 
    // Присваиваем в массив путь к маленькому изображению:
    $arrayOfPathToMiniImages["$i"] = $miniImage;
    // Права на данное изображение:
//    chmod($miniImage, 0755);
}


try {
    // подгружаем шаблон
    $gallery = $twig->loadTemplate('gallery.tmpl');

    // передаём в шаблон переменные и значения
    // выводим сформированное содержание
    echo $gallery->render(array(
      'arrayOfPathToMiniImages' => $arrayOfPathToMiniImages
    ));
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}