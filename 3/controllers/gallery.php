<?php

// Объявление массива для путей к маленьким изображениям:
$arrayOfPathToMiniImages = array();

// Подключаем модель изменения изображения:
include_once 'models/resize_images.php';

// Подключаем модель сканирования названий изображений
include_once 'models/scan_dir_images.php';

try { 
    // подгружаем шаблон
    $gallery = $twig->loadTemplate('gallery.tmpl');
    
    // Путь к оригинальным изображениям:
    $imageDirPath = "data/images/";
        
    // Сканирую дирректорию на наличие изображений:
    $arrayNameImages = scan_dir_images($imageDirPath);
    
    // Циклом по массиву имен изображений для уменьшения изображений:
    foreach ($arrayNameImages as $value){
        
        // Путь к маленькому изображению:
        $miniImage = "data/mini_images/" . $value;
        
        // Путь к оригинальному изображению:
        $image = "data/images/" . $value;
        
        // Проверка существования файла:ss
        if (!file_exists($miniImage)){
            // Уменьшаем изображение:
            resize_images(400, $miniImage, $image);
        }
        
    }
//        echo $gallery->render(array(
//          'pathToBigImage' => $image
//        ));

    // Отдаем в галерею массив с именами изображений:
     echo $gallery->render(array(
          'arrayNameImages' => $arrayNameImages
    ));
      
} catch (Exception $e) { // Отлов исключений
    die('ERROR: ' . $e->getMessage());
}