<?php
// подгружаем и активируем авто-загрузчик Twig-а
require_once 'lib/Twig/Autoloader.php';
Twig_Autoloader::register();

require_once 'controllers/main.php';