<?php

abstract class Goods
{
    // Переменная стоимости товара:
    protected $cost;
    // Гетер для получения стоимости товара:
    final public function getCost()
    {
        return $this->cost;
    }
    
    // Переменная кол-ва товара amount
    protected $amount;
    // Геттер для получения кол-ва товара getAmount()
    final public function getAmount()
    {
        return $this->amount;
    }
   
    // Констурктор для создания объекта с ценой и кол-вом товаров.
    public function __construct($cost,$amount)
    {
        $this->cost = $cost;
        $this->amount = $amount;
    }   
    
    // Вычисление финальной стоимости товара
    abstract protected function countingTheCost();
    
    // Выручка
    abstract protected function earnings();
}