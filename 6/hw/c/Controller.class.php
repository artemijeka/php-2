<?php
/**
 * Абстрактный класс контроллера.
 */
session_start();

abstract class Controller
{
    /**
     * Для вызова того или иного метода.
     * 
     * @param string $method метод переданный в $_GET по имени 'method'
     */
    public function request($method)
    {
	    $this -> before();
	    $this -> header();
        $this -> $method(); //$this read - например
        $this -> footer();
    }
    
    protected abstract function before();
    
    protected abstract function header();
    
    protected abstract function footer();
    
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
     * Метод отлавливает неверное обращение к методу в url.
     * @param unknown $name
     * @param unknown $params
     * @return сообщение об ошибке
     */
    public function __call($name, $params)
    {
        die('Неверный url...');
    }
}