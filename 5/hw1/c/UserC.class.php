<?php

class UserC extends BaseC
{
    /**
     * Выводит информацию о пользователе.
     */
    public function info()
    {
        $get_user = new UserM();
        $user_info = $get_user ->getUser($_SESSION['user_id']);
        $this -> title .= ' | ' . $user_info['name'];
        $this -> content = 
        
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('user_info.twig');
        $vars = array(
            'username' => $user_info['name'],
            'userlogin' => $user_info['login']
        );
        echo $template -> render($vars);        
    }
}