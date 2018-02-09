<?php

$nameImage = $_GET['name'];

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
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $twig->render('image.tmpl', array(
    'title' => 'Страница изображения - ДЗ по php-2 - урок 3 - задание 1',
    'nameImage' => $nameImage
  ));
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}