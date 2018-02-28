<?php
/*include_once 'm/SQL.php';*/

if (isset($_COOKIE['cart'])) {
   $cookieCart = $_COOKIE['cart'];
    $explodeCookie = explode(",", $cookieCart);
    $myCartArray = [];
    /*Создаем массив с данными о id товаров и количестве разбивая cookie*/
    for ($i=0; $i < count($explodeCookie); $i++) { 
        $myCartArray[$i] = explode(":", $explodeCookie[$i]);
    }

   $getProdForCart = [];
    for ($i=0; $i < count($myCartArray); $i++) { 
        $prodCount = $myCartArray[$i][0];
        $getProdForCart[$i] = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$prodCount'");
    }
}