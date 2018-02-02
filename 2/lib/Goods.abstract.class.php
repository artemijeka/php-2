<?php

abstract class Goods 
{
    // Вычисление финальной стоимости товара
    abstract protected function calculationFinalValue();
    
    // Стоимость товара
    private $cost; 
    
    // Гетер для получения стоимости товара:
    public function getCost()
    {
        return $this->cost;
    }

    // Выручка
//    public function earnings()
//    {
//        
//    }
}