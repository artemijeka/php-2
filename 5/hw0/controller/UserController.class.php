<?php

class UserController extends Controller
{
    public $title = 'Пользователь';
    public $view = 'user';
    
//    function index(){}
    
    public function login() 
    {
        $this->title .= ' | Вход';
    } 
}