<?php

class UserC extends BaseC
{
    /**
     * Выводит информацию о пользователе.
     */
    public function getUser()
    {
        $get_user = new UserM();
        $user_info = $get_user -> getUser($_SESSION['user_id']);
        $this -> title .= ' | ' . $user_info['name'];
        
        $vars = array(
            'username' => $user_info['name'],
            'userlogin' => $user_info['login']
        );
        $this -> myTwigTemplate('user_info.twig', $vars);
    }
    
    /**
     * Метод класса создающий экземпляр модели UserM и выводящий в шаблон полученные данные.
     */
    public function regUser() 
    {		
    	$this -> title .= ' | Регистрация';
                    
    	if($this->isPost()) {
    	    $new_user = new UserM();
    	    $res = $new_user -> regUser($_POST['name'], $_POST['login'], $_POST['password']);
            $vars = array('text' => $res);
            $this -> myTwigTemplate('user_reg.twig', $vars);
        } else {
            $this -> myTwigTemplate('user_reg.twig');
            
        }
    }
    
    /**
     * Метод логина контроллера UserC создающий экземпляр модели UserM и выводящий в шаблон полученные данные. 
     */
    public function login() 
    {
    	$this -> title .= ' | Вход';
    	$this -> myTwigTemplate('user_login.twig');
           
    	if($this -> isPost()) {
    	    $login = new UserM();
    	    $res = $login -> login($_POST['login'], $_POST['password']);
                echo $res;
    	}
    }
    
    /**
     * Метод выхода пользователя.
     */
    public function logout() {
    	$logout = new UserM();
    	$result = $logout -> logout();
    }	
                
}