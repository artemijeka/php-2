<?php

// Весовой товар
class WeightGoods extends AbstractGoods
{
    public function addOrder($amount)
    {
        parent::addOrder($amount);
        echo "Стоимость 1 кг игровых дисков: ".$this -> getCost()." руб.<br>";
        echo "Кол-во кг заказано: ".$this -> getAmount()." кг.<br>";
        echo "Итого покупка составила: ".$this -> countingTheCost()." руб.<br>";        
    }

    // Выручка
    public function getEarnings()
    {
        echo 'Выручка со всех проданных килограмм дисков (' .$this->totalAmount. ' кг) составила: ' . $this->earnings . ' руб.';    
    }
        
}