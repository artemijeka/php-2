<?php

$userId = $_SESSION['id'];
/*Достаем заказы*/
$ordersObj = SQL::Instance()->Select("SELECT * FROM orders_table WHERE user_id='$userId'");

if($ordersObj){
    /*Достаем товары в этих заказах*/
    foreach($ordersObj as $key=>$value){
        $explodeProd = explode(",", $value['products_list']);

        for($i=0; $i < count($explodeProd); $i++){
            $myOrdersArray[$key][$i] = explode(":", $explodeProd[$i]);
        }

    }

    $ordersArr = [];
    for($i=0; $i < count($myOrdersArray); $i++){
        for($j=0; $j < count($myOrdersArray[$i]); $j++){
            $thisOrder = $myOrdersArray[$i][$j][0];
            $ordersArr[$i][$j] = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$thisOrder'");
        }
    }
}else{
    $message = 'У вас нет актуальных заказов!';
}
