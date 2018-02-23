<?php
/**
 * Контроллер отвечающий за инструментарий админа.
 */
class AdminC extends BaseC
{
    /**
     * Выводит и контролирует шаблон загрузки товара в админке.
     */
    public function loadItem()
    {
        $admin = new AdminM();
        $vars = [];
        
        if ($this -> isPost()) {
            $item_image = $_FILES['item_image'];
// var_dump($item_image);
            $item_directory = IMAGE_DIRECTORY . $_FILES['item_image']['name'];
            $item_name = $_POST['item_name'];
            $item_description = $_POST['item_description'];
            $item_price = $_POST['item_price'];
            
            $vars['return_msg'] = $admin -> loadItem($item_image, $item_directory, $item_name, $item_description);  
        }
        
        MyTwigM::myTwigTemplate('load_item.twig', $vars);
    }
    
    
    
}