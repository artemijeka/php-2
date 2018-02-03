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
    
    // Вычисление финальной стоимости товара
    abstract public function calculationFinalValue();
    
    // Выручка
    abstract public function earnings();
        
    // Гетер для получения стоимости товара:
//    final public function getCost()
//    {
//        return $this->cost;
//    }
}