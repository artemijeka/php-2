<?php

include_once 'Singleton.trait.php';

// Какой-то класс на котором нужно применить шаблон проектирования синглтон
class GetSingleton
{
    // Подключаем трейт синглтона
    use Singleton;
    // Защищенный метод, который вызывается только через экземпляр синглтона
    protected function init()
    {
        echo '<br>Hello! The singleton from the trait works!<br>';
    }
}