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
            'user_name' => $user_info['name'],
            'user_login' => $user_info['login'],
            'is_admin' => $user_info['is_admin']
        );
            MyTwigM::myTwigTemplate('user_info.twig', $vars);
    }
    
    /**
     * Метод класса создающий экземпляр модели UserM и выводящий в шаблон полученные данные.
     */
    public function regUser() 
    {		
    	$this -> title .= ' | Регистрация';
                    
    	if($this->isPost()) {
    	    $reg_user = new UserM();
    	    $res = $reg_user -> regUser($_POST['name'], $_POST['login'], $_POST['password']);
            $vars = array('text' => $res);
            MyTwigM::myTwigTemplate('user_reg.twig', $vars);
        } else {
            MyTwigM::myTwigTemplate('user_reg.twig');
        }
    }
    
    /**
     * Метод логина контроллера UserC создающий экземпляр модели UserM и выводящий в шаблон полученные данные. 
     */
    public function login() 
    {
    	$this->title .= ' | Вход';
    	
//    	if (isset($_SESSION['is_admin'])) {
//    	    $this -> is_admin = $_SESSION['is_admin'];
//    	}
    	
    	if ($this->isPost()) {
    	    $login = new UserM();
    	    $res = $login->login($_POST['login'], $_POST['password']);
            echo $res;
    	}
        
    	MyTwigM::myTwigTemplate('user_login.twig');
    }
    
    /**
     * Метод выхода пользователя.
     */
    public function logout() {
    	$logout = new UserM();
    	$logout -> logout();
    }
    
    
                
}