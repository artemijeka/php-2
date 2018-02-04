<?php

// Штучный товар
class PieceGoods extends AbstractGoods
{
    public function addOrder($amount)
    {
        parent::addOrder($amount);
        echo "Стоимость диска с игрой: ".$this -> getCost()." руб.<br>";
        echo "Кол-во дисков заказано: ".$this -> getAmount()." шт.<br>";
        echo "Итого покупка составила: ".$this -> countingTheCost()." руб.<br>";        
    }

    // Выручка
    public function getEarnings()
    {
        echo 'Выручка со всех проданных дисков (' .$this->totalAmount. ' шт) составила: ' . $this->earnings . ' руб.';
    }
}