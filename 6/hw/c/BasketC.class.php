<?php

class BasketC extends BaseC
{
    public function getBasket()
    {
        $this -> title .= " | Корзина";
        
        
        if (isset($_SESSION['basket'])) {
            $res_basket = BasketM::getContentForBasket($_SESSION['basket']);
echo '<pre>$res_basket:';
print_r($res_basket);
echo '</pre>';

            $vars = [
                'title' => 'Ваша корзина:'
            ];
        } else {
            $vars = [
                'title' => 'Корзина пуста!'
            ];
        }

        MyTwigM::myTwigTemplate('basket.twig', $vars);
    }
    
    
    
}