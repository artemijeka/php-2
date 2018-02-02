<?php

include_once 'Goods.abstract.class.php';
include_once 'PieceGoods.class.php';

class DigitalGoods extends Goods
{
    // У цифровой версии игры стоимость постоянная 
    // и дешевле штучной игры на диске в два раза
    private $cost = 1500;

    // Определение абстрактного метода подсчета финальной стоимости
    protected function calculationFinalValue()
    {
        #
    }

}