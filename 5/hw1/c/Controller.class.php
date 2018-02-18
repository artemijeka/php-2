<?php
/**
 * 
 */
session_start();

abstract class Controller
{
    /**
     * Проверяет используется ли метод POST
     */
    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
}