<?php

class AdminC extends BaseC
{
    /**
     * Выводит и контролирует шаблон админки.
     */
    public function loadItem()
    {
        $admin = new AdminM();
        if ($this -> isPost()) {
            $item_image = $_POST['item_image'];
            $item_dirrectory = IMAGE_DIRRECTORY;
            $item_name = $_POST['item_name'];
            $item_description = $_POST['item_description'];
            
            $admin -> loadItem($item_image, $item_dirrectory, $item_name, $item_description);
        }
               
        //         var_dump($item_image);
        //         var_dump($item_name);
        //         var_dump($item_description);
     
        MyTwigM::myTwigTemplate('load_item.twig');
    }
    
    
}