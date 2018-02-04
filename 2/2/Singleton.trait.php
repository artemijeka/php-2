<?php

trait Singleton 
{
    // Закрываем конструктор в приват
    private function __construct(){echo 'Единожды создался экземплер синглтона с помощью трейта... ';}
    
    // Приватный экземпляр объекта
    private static $instance; 
    
    // Внешний метод чтобы получить экземпляр данного класса
    public static function getInstance()
    {
        if(self::$instance===null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    private function __clone(){}
    private function __wakeup(){}
}


