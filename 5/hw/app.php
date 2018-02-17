<?php
require_once 'autoload.php'; // Подгрузка всех классов, моделей, библиотек.

try{
    App::init(); // Инициализация приложения.
}
catch (PDOException $e){ // Отлавливаем ошибки подключения к бд.
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){ // Отлавливаем другие ошибки.
    echo $e->getMessage();
}
