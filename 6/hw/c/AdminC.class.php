<?php

class AdminC extends BaseC
{
    /**
     * Выводит и контролирует шаблон админки.
     */
    public function getAdmin()
    {
        MyTwigM::myTwigTemplate('admin.twig');
        if ($this-> isPost()) {
            $file = $_POST['file'];
//             var_dump($file);
        }
        
    }
    
}