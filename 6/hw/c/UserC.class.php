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
        
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('user_info.twig');
        $vars = array(
            'username' => $user_info['name'],
            'userlogin' => $user_info['login']
        );
        echo $template -> render($vars);        
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
    	$this->title .= ' | Вход';
    	$loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
            $twig = new Twig_Environment($loader); // Регистрируем твиг.
            $template = $twig -> loadTemplate('user_login.twig');
            echo $template -> render(array());
           
    	if($this->isPost()) {
    	    $login = new UserM();
    	    $res = $login -> login($_POST['login'], $_POST['password']);
                echo $res;
    	}
    }
    
    public function logout() {
    	$logout = new UserM();
    	$result = $logout -> logout();
    }	
                
}