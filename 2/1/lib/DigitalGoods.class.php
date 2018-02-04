<?php

// Цифровой товар
class DigitalGoods extends AbstractGoods
{
    public function addOrder($amount) 
    {
        parent::addOrder($amount);
        echo "Стоимость цифровой копии с игрой: ".$this -> getCost()." руб.<br>";
        echo "Кол-во копий заказано: ".$this -> getAmount()." шт.<br>";
        echo "Итого покупка составила: ".$this -> countingTheCost()." руб.<br>";
    }

    // Выручка
    public function getEarnings()
    {
        echo 'Выручка со всех проданных копий (' .$this->totalAmount. ' шт) составила: ' . $this->earnings . ' руб.';
    }
}