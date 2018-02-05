<?php

include_once 'GetSingleton.class.php';

// Запуск через синглтон трейт
GetSingleton::getInstance()->getHello();

// Почему так работает? Нормально ли это?
GetSingleton::getHello();