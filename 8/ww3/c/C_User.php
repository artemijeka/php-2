<?php
//
// Конттроллер страницы чтения.
//

//Подключаем модели
/*
$scanModels = scandir('m/');
foreach($scanModels as $value){
	if($value == '.' || $value == '..') continue;
	include_once 'm/' .$value;
}
*/

class C_User extends C_Base
{
	//
    // Конструктор
    //
    
	public function action_signin(){
		$this->title .= '- Вход';
		include 'm/submit_signin.php';
		$this->content = $this->Template('v/v_signin.php');		
	}
    
    public function action_signup(){
		$this->title .= '- Регистрация';
		include 'm/submit_signup.php';
		$this->content = $this->Template('v/v_signup.php');		
	}
    
    public function action_room(){
		$this->title .= '- Личный кабинет';
		/*include 'm/submit_signup.php';*/
        include_once 'm/room_models.php';
        if(isset($myOrdersArray)){
            $this->content = $this->Template('v/v_room.php', array('orders'=>$ordersArr, 'orderCount'=>$myOrdersArray, 'status'=>$ordersObj));
        }else{
             $this->content = $this->Template('v/v_room.php', array('message'=>$message));
        }
	}
}