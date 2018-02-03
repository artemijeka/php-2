<?php

require_once 'Goods.abstract.class.php';

// Цифровой товар
class DigitalGoods extends Goods
{
    // Есть метод получения стоимоси getCost();   
    // Сеттер для получения кол-ва товара setAmount($amount)
    // Геттер для получения кол-ва товара getAmount() 
    
    // Вычисление финальной стоимости товара
    public function countingTheCost() 
    {
        return $this->cost * $this->amount;
    }
    // Выручка
    public function earnings()
    {
        return null;
    }
}