<?php

class BasketC extends BaseC
{
    public function getBasket()
    {
        $this -> title .= " | Корзина";
        
//echo '<pre>';
//var_dump($vars);
//echo '</pre>';
        
        if (isset($_SESSION['basket'])) {
            BasketM::getBasketArray($_SESSION['basket']);
            var_dump($_SESSION['basket']);
        }
        
        $vars = [];
        
        MyTwigM::myTwigTemplate('basket.twig', $vars);
    }
    
    
    
}