<?php
/**
 * Абстрактный класс контроллера.
 */
session_start();

abstract class Controller
{
    /**
     * Для вызова того или иного метода.
     * @param string $method метод переданный в $_GET по имени m=
     */
    public function request($method)
    {
	    $this->before();
        $this->$method(); //$this -> method_index
        $this->render();
    }
    
    protected abstract function before();
    
    protected abstract function render();
    
    /**
     * Проверяет используется ли метод POST.
     * @return boolean
     */
    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    /**
     * Проверяет используется ли метод GET.
     * @return boolean
     */
    protected function isGet() 
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
    
    /**
     * Метод выводит заданный шаблон с заданными переменными в массиве.
     * @param string $templateName имя шаблона в v/
     * @param array $vars массив переменных которые выводятся в шаболоне 
     */
    protected function myTwigTemplate($templateName, $vars = array())
    {
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate($templateName); // Указываем шаблон.
        
        echo $template -> render($vars);
    }
    
    public function __call($name, $params)
    {
        die('Неверный url...');
    }
}