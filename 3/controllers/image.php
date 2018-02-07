<?php

// подгружаем и активируем авто-загрузчик Twig-а
require_once '../lib/Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  // указываем где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('../views');

  // инициализируем Twig
  $twig = new Twig_Environment($loader);
  
  // подгружаем шаблон
  $image = $twig->loadTemplate('image.tmpl');

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $image->render(array(
    
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

include_once '../views/image.tmpl';