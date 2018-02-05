<?php

include_once 'Singleton.trait.php';

// Какой-то класс на котором нужно применить шаблон проектирования синглтон
class GetSingleton
{
    // Подключаем трейт синглтона
    use Singleton;
    // Публичный метод но который вызывается только через экземпляр синглтона
    public function getHello()
    {
        echo '<br>Hello! The singleton from the trait works!<br>';
    }
}