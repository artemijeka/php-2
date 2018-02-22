<?php

class AdminC extends BaseC
{
    /**
     * Выводит и контролирует шаблон админки.
     */
    public function loadItem()
    {
        MyTwigM::myTwigTemplate('load_item.twig');
        
        $admin = new AdminM();
        
        if ($this -> isPost()) {
            $item_image = $_FILES['item_image'];
            var_dump($item_image);
            $item_directory = IMAGE_DIRRECTORY;
            $item_name = $_POST['item_name'];
            $item_description = $_POST['item_description'];
            
            $admin -> loadItem($item_image, $item_directory, $item_name, $item_description);
        }
        
    }
    
}