<?php

$arrayOfPathToMiniImages = array();

include_once 'models/count_files.php';
$countFiles = count_files('data/images');

include_once 'models/resize_images.php';
for ($i=1; $i<=$countFiles; $i++){
   resize(400, "data/images/mini/$i" . ".jpg", "data/images/$i" . ".jpg"); 
   $arrayOfPathToMiniImages["$i"] = "data/images/mini/$i";
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