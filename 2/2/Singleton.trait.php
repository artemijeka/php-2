<?php

trait Singleton 
{
    // Защищенное статичное свойство 
    protected static $instance;
    // Финальный публичный статичный метод для полуения instance
    final public static function getInstance()
    {
        return isset(static::$instance) 
        ? static::$instance
        : static::$instance = new self;
    }
    // Финальный закрытый конструктор
    final private function __construct() {
        $this->init();
    }
    // Определение названия метода для инициалзации
    protected function init() {}
    final private function __wakeup() {}
    final private function __clone() {}  
}


