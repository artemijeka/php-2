<?php

try {
  // подгружаем шаблон
  $main = $twig->loadTemplate('main.tmpl');

  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $main->render(array(
    'title' => 'ДЗ по php-2 - урок 3 - задание 1'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}