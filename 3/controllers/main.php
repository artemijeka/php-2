<?php

try {
  // передаём в шаблон переменные и значения
  // выводим сформированное содержание
  echo $twig->render('main.tmpl', array(
    'title' => 'ДЗ по php-2 - урок 3 - задание 1'
  ));

} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}

