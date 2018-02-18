<?php

class UserC extends BaseC
{
    /**
     * Выводит информацию о пользователе.
     */
    public function getUserC()
    {
        $get_user = new UserM();
        $user_info = $get_user -> getUserM($_SESSION['user_id']);
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
     * @Description: Метод класса создающий экземпляр модели UserM и выводящий в шаблон полученные данные.
     */
    public function regUserC() 
    {		
	$this -> title .= ' | Регистрация';
        
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('user_reg.twig');
        
	if($this->isPost()) {
	    $new_user = new UserM();
	    $result = $new_user -> regUserM($_POST['name'], $_POST['login'], $_POST['password']);
	    if ($result) {
	    	echo $template -> render(array('text' => $result));  
	    } else {
	    	echo $template -> render(array('text' => $result)); 
            }
	}
    }
    
    /**
     * @Description: Метод логина контроллера UserC создающий экземпляр модели UserM и выводящий в шаблон полученные данные. 
     */
    public function loginC() 
    {
	$this->title .= ' | Вход';
	$loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('user_login.twig');

	if($this->isPost()) {
	    $login = new UserM();
	    $result = $login->loginM($_POST['login'], $_POST['password']);
	    if ($result) {
	    	echo $template -> render(array('text' => $result));
	    } else {
	    	echo $template -> render(array('text' => $result));
	    }
	}
    }
                
}