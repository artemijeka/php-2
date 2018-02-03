<?php

// Автозагрузка классов:
spl_autoload_register(function($ClassName)
{
   include 'lib/' . $ClassName . '.class.php'; 
});

// Новый штучный товар (стоимость, кол-во)
$pg = new PieceGoods(1500, 3);
echo "Стоимость диска с игрой: ".$pg -> getCost()." руб.<br>";
echo "Кол-во дисков в корзине: ".$pg -> getAmount()." шт.<br>";
echo "Финальная стоимость товаров в корзине: ".$pg -> countingTheCost()." руб.<br>";

// Новый цифровой товар (стоимость, кол-во) 
$dg = new DigitalGoods($pg->getCost()/2, 3);