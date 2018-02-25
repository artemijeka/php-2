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
            $item_image_dir = IMAGE_DIRRECTORY . $_FILES['item_image']['name'];
            $item_min_image_dir = MIN_IMAGE_DIRRECTORY . $_FILES['item_image']['name'];
            $item_name = $_POST['item_name'];
// var_dump($item_name);
            $item_description = $_POST['item_description'];
            $item_price = $_POST['item_price'];
            
            if (!$item_name == "") {
                $vars['return_msg'] = $admin -> loadItem($item_image, $item_image_dir, $item_min_image_dir, $item_name, $item_description, $item_price);
            } else {
                $vars['return_msg'] = 'Введите имя загружаемой позиции.';
                unset($item_name); 
// var_dump($item_name);
            }
// var_dump($vars);
        }
        
        MyTwigM::myTwigTemplate('load_item.twig', $vars);
    }
    
    
    
}