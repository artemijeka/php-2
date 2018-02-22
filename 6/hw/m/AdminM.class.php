<?php

class AdminM
{
    public function __construct(){}
    
    /**
     * Метод загрузки нового товара на сервер и бд.
     * 
     * @param unknown $item_image
     * @param string $item_dirrectory
     * @param string $item_name
     * @param string $item_description
     */
    public function loadItem($item_image, $item_dirrectory, $item_name, $item_description)
    {
        $this -> uploadImageToServer($item_image, $item_dirrectory); // Загрузка изображения на сервер.
        
    }
    
    /**
     * Метод загруки файла на сервер.
     * 
     * @param unknown $uploaded_image
     * @param unknown $path_to_dir
     * @return boolean
     */
    public function uploadImageToServer($uploaded_image, $path_to_dir) 
    {
        if ($uploaded_image['size'] < 5000000) { // Ограничение в 4.76 Мб.
            if (move_uploaded_file($uploaded_image['tmp_name'], $path_to_dir)) { 
                // echo "Файл корректен и был успешно загружен.\n";
                return true;
            } else if ($uploaded_image['size'] > 5000000) { // Ограничение в 4.76 Мб.
                // echo "Файл небыл загружен, потому что больше 5Мб!\n";
                return false;
            }
        }
    }
    
    
}