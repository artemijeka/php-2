<?php

include_once 'Goods.abstract.class.php';

// Штучный товар
class PieceGoods extends Goods
{
    // Стоимость допустим диска с игрой:  
    private $cost = 1500;
    
    
    protected function calculationFinalValue() {
        return null;
    }

}