<?php

class BasketC extends BaseC
{
    public function getBasket()
    {
        $this -> title .= " | Корзина";
        $basket_obj = $_SESSION['basket'];
        
//echo '<pre>';
//var_dump($vars);
//echo '</pre>';
            
        BasketM::getBasketArray($basket_obj);
        $vars = [
          
        ];
        MyTwigM::myTwigTemplate('basket.twig', $vars);
    }
    
    
    
}