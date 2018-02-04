<?php

abstract class AbstractGoods
{
    // Переменная стоимости товара
    protected $cost;
    // Переменная в которую суммируется выручка
    protected $earnings;
    // Переменная кол-ва товара
    protected $amount;
    // Переменная в которую сумируется кол-во товара товарpа
    protected $totalAmount;


    // Гетер для получения стоимости товара getCost()
    final public function getCost()
    {
        return $this->cost;
    }
    
    // Геттер для получения кол-ва товара getAmount()
    final public function getAmount()
    {
        return $this->amount;
    }
   
    // Констурктор для создания объекта с ценой
    final public function __construct($cost)
    {
        $this->cost = $cost;
    } 

    // Вычисление итоговой стоимости товара
    final public function countingTheCost() 
    {
        return $this->cost * $this->amount;
    }
    
    // Создание заказа на кол-во штук/кг/вес
    protected function addOrder($amount)
    {
        $this->amount = $amount;
        $this->totalAmount += $amount;
        $this->earnings += self::countingTheCost();
    }
    
    // Метод выдает выручку по всем заказам товара:
    abstract protected function getEarnings();
}