<?php

include_once 'Goods.abstract.class.php';

// Штучный товар
class PieceGoods extends Goods
{
    // Стоимость допустим диска с игрой:  
    protected $cost = 1500;
    // Есть метод получения стоимоси getCost();   
         
    // Вычисление финальной стоимости товара
    public function calculationFinalValue() 
    {
        return null;
    }
    // Выручка
    public function earnings()
    {
        return null;
    }
}