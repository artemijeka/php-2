<?php

include_once 'Goods.abstract.class.php';

class DigitalGoods extends Goods
{
    // У цифровой версии игры стоимость постоянная 
    // и дешевле штучной игры на диске в два раза
    protected $cost = 1500;
    // Есть метод получения стоимоси getCost();   

    // Определение абстрактного метода подсчета финальной стоимости
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