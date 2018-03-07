<?php

class BasketC extends BaseC
{
    public function getBasket()
    {
        $this -> title .= " | Корзина";
        
        
        if (isset($_SESSION['basket'])) {
            $content_array = BasketM::getContentForBasket($_SESSION['basket']);
echo '<pre>$content_array:';
print_r($basket_content_array);
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