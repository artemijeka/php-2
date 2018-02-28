<?php
//
// Конттроллер страницы Корзина.
//


class C_Cart extends C_Base
{
	//
	// Конструктор.
	//

	public function action_index(){
		$this->title .= '- Корзина';
        include_once 'm/cart_show.php';
        if(isset($getProdForCart) && isset($myCartArray)){
            $this->content = $this->Template('v/v_cart.php', array('getProdForCart' => $getProdForCart, 'countArray'=>$myCartArray));
        }else{
            $message = 'Ваша корзина пуста';
            $this->content = $this->Template('v/v_cart.php', array('message' => $message));
        }
		
	}
    
    public function action_order(){
        $this->title .= '- Оформление заказа';
        if(!isset($_SESSION['login'])){
            $message = "Вы не вошли или еще не зарегистрированы. <a href='/my_shop/user/signin'>Войдите</a> или <a href='/my_shop/user/signup'>Зарегистрируйтесь</a>";
            $this->content = $this->Template('v/v_order.php', array('message' => $message));
        }else{
            include_once 'm/cart_order.php';
            $this->content = $this->Template('v/v_order.php');
        }
    }
	
}
