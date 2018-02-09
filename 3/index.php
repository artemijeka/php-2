<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'lib/vendor/autoload.php';

try {
  // указываем где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('views');

  // инициализируем Twig
  $twig = new Twig_Environment($loader, array(
//    'cache' => 'data/cache',
    'charset' => 'utf-8'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

require_once 'controllers/main.php';
require_once 'controllers/gallery.php';