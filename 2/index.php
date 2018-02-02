<?php

include_once 'lib/DigitalGoods.class.php';

// Новый цифровой товар
$dg = new DigitalGoods;
echo $dg -> getCost();