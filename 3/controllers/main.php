<?php

try {
  // указываем где хранятся шаблоны
  $loader = new Twig_Loader_Filesystem('./views');

  // инициализируем Twig
  $twig = new Twig_Environment($loader);

  // подгружаем шаблон
  $template = $twig->loadTemplate('main.tmpl');

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $template->render(array(
    'title' => 'ДЗ по php-2 - урок 3 - задание 1'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
