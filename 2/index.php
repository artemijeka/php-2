<?php

include_once 'lib/DigitalGoods.class.php';
include_once 'lib/PieceGoods.class.php';

// Новый цифровой товар
$dg = new DigitalGoods;
echo $dg -> getCost();
echo 'Hello!';