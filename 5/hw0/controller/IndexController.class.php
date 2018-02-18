<?php

class IndexController extends Controller
{
    public $view = 'index'; // Имя папки в templates представлении.
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
    }
    
    public function login()
    {
        $this->title .= ' | Авторизован';
    }

}