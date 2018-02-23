<?php
/**
 * Модель отвечающая за инструментарий админа.
 */
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
    public function loadItem($item_image, $item_directory, $item_name, $item_description)
    {
        $this -> uploadImageToServer($item_image, $item_directory); // Загрузка изображения на сервер.
        $object = [
            'directory' => $item_directory,
            'name' => $item_name,
            'description' => $item_description
        ];
        var_dump($object);
        PdoM::Insert(GOODS, $object); // Передача в базу данных имени, описания и путь к изображению товара.
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
        // Проверяем был ли загружен файл.
        if(is_uploaded_file($uploaded_image['tmp_name'])) {
            // Ограничение в 4.76 Мб.
            if ($uploaded_image['size'] < 5000000) { 
                // Если файл загружен успешно, перемещаем его
                // из временной директории в конечную.
                if (move_uploaded_file($uploaded_image['tmp_name'], $path_to_dir)) { 
                    return "Файл корректен и был успешно загружен.\n";
                } else if ($uploaded_image['size'] > 5000000) { // Ограничение в 4.76 Мб.
                    return "Файл небыл загружен, потому что больше 5Мб или уже существует.\n";
                }
            }
        }
        
    }
       
    
    
}