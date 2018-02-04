<?php

// Автозагрузка классов:
spl_autoload_register(function($ClassName)
{
//     require_once 'lib/AbstractGoods.class.php';
     require_once 'lib/' . $ClassName . '.class.php';   
});

// Новый штучный товар (стоимость за диск):
$pg = new PieceGoods(1500);
echo '<b>Новый заказ на 3 игровых диска:</b><br>';
$pg->addOrder(3);

echo '<br>';

// Новый цифровой товар (стоимость за копию) 
$dg = new DigitalGoods($pg->getCost()/2);
echo '<b>Новый заказ товара на 3 копии игры:</b><br>';
$dg->addOrder(3);

echo '<br>';

echo '<b>Еще заказ товара на 2 копии игры:</b><br>';
$dg->addOrder(3);

echo '<br>';

// Новый весовой товар (стоимость за кг) 
$wg = new WeightGoods(10000);
echo '<b>Новый заказ на 300 грамм игровых дисков:</b><br>';
$wg->addOrder(0.3);

echo '<br>';

echo '<b>Еще заказ на 1 игровой диск:</b><br>';
$pg->addOrder(1);

echo '<br>';

echo '<b>Еще заказ на 220 грамм игровых дисков:</b><br>';
$wg->addOrder(0.22);

echo '<br><hr><br>';

// Вывод выручки на экран
$pg->getEarnings();
echo '<br>';
$dg->getEarnings();
echo '<br>';
$wg->getEarnings();