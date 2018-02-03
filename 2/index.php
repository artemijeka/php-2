<?php

require_once 'lib/PieceGoods.class.php';
require_once 'lib/DigitalGoods.class.php';

// Новый цифровой товар
$dg = new PieceGoods;
echo $dg -> getCost();