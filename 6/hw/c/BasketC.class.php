<?php

class BasketC extends BaseC
{
    public function getBasket()
    {
        $this -> title .= " | Корзина";
        $basket_obj = $_SESSION['basket'];
echo '<pre>';
var_dump($basket_obj);
echo '</pre>';  
        
//         BasketM::getBasket($basket_obj);
//         foreach ($basket_obj as $item => $option_obj) {
//             foreach ($option_obj as $item_option) {
//                 $vars['item'] =  
//             }
//         }
        $vars = [];
        MyTwigM::myTwigTemplate('basket.twig', $vars);
    }
    
    
    
}