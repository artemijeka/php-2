<?php
/**
 * Модель отвечающая за инструментарий админа.
 */
class AdminM
{
    public function __construct(){}
    
    /**
     * Метод загрузки новой позиции на сервер и бд.
     * 
     * @param unknown $item_image
     * @param string $item_dirrectory
     * @param string $item_name
     * @param string $item_description
     */
    public function loadItem($item_image, $item_image_dir, $item_min_image_dir, $item_name, $item_description, $item_price)
    {
        $res = PdoM::Instance() -> Select(GOODS, 'name', $item_name, false);
// echo "<pre>";        
// var_dump($res['name']);
// echo "</pre>";
        // Если в бд отсутствует такое имя позиции:
        if ($res['name'] !== $item_name) {
            $object = [
                'image_dir' => $item_image_dir,
                'min_image_dir' => $item_min_image_dir,
                'name' => $item_name,
                'description' => $item_description,
                'price' => $item_price
            ];
// var_dump($object);
            PdoM::Instance() -> Insert(GOODS, $object); // Передача в базу данных имени, описания и путь к изображению товара.
            // Загрузка оригинала изображения на сервер:
            if ($image_is_upload = $this -> uploadImageToServer($item_image, $item_image_dir)) {
                // Создание миниатюры изображения:
                if ($this -> imageZoomOut($item_image_dir, 400, $item_min_image_dir)) {
                    return "Изображение загружено и создана уменьшенная копия.";
                } else {
// var_dump($this -> imageZoomOut($item_image_dir, 400, $item_min_image_dir));
                    return 'Изображение было загружено, но небыла создана уменьшенная копия.';   
                }               
            } else {
                return 'Изображение небыло загружено.';
            }
        } else {
            return "Такое имя позиции уже есть в бд.";
        }
    }
    
    /**
     * Метод уменьшения изображения.
     * 
     * @param array $item_image
     * @param integer $width
     */
    public function imageZoomOut($original_image_dir, $new_width, $target_image_dir)
    {
        $info = getimagesize($original_image_dir);
        $mime = $info['mime'];
        
        switch ($mime) {
            case 'image/jpeg':
                $image_create_func = 'imagecreatefromjpeg';
                $image_save_func = 'imagejpeg';
                // $new_image_ext = 'jpg';
                break;
                
            case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                // $new_image_ext = 'png';
                break;
                
            case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                // $new_image_ext = 'gif';
                break;
                
            default:
                throw new Exception('Unknown image type.');
        }
        
        $img = $image_create_func($original_image_dir);
        list($width, $height) = getimagesize($original_image_dir);
        
        $new_height = ($height / $width) * $new_width;
        $tmp = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        
        if (file_exists($target_image_dir)) {
            unlink($target_image_dir);
        }
        // $image_save_func($tmp, "$targetFile.$new_image_ext");
        if ($image_save_func($tmp, "$target_image_dir")) {
            return true;
        }
    }
    
    /**
     * Метод загруки файла на сервер.
     * 
     * @param array $uploaded_image
     * @param string $path_to_dir
     * @return boolean
     */
    public function uploadImageToServer($uploaded_image, $path_to_dir) 
    {
        // Проверяем был ли загружен файл.
        if(!is_uploaded_file($uploaded_image['name'])) {
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