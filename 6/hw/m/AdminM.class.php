<?php
/**
 * Модель отвечающая за инструментарий админа.
 */
class AdminM
{
    public function __construct(){}


    /**
     * Модуль управления заказами.
     *
     *
     */
    public function basketsUsers()
    {
        $res_query = PdoM::Instance()->MyQuery('SELECT * FROM `'.BASKETS.'` LEFT JOIN `'.USERS.'` ON `'.BASKETS.'`.`user_id`=`'.USERS.'`.`user_id`');
echo '<pre>AdminM->basketsUsers()=$res_query:';
print_r($res_query);
echo '</pre>';

        foreach ($res_query as $id => $array_user_order) {
//            $basket = BasketM::getContentForBasket($res_query);
            $item_name = PdoM::Instance()->MyQuery('SELECT `name` FROM `'.ITEMS.'` WHERE `item_id`='.$array_user_order['item_id']);
            $option_name = PdoM::Instance()->MyQuery('SELECT `option_name` FROM `'.OPTIONS.'` WHERE `option_id`='.$array_user_order['option_id']);
            $price = PdoM::Instance()->MyQuery('SELECT `price` FROM `'.ITEMS.'` WHERE `item_id`='.$array_user_order['item_id']);
//print_r($price[0]['price']);
            // Проверка на число в бд:
            if (is_numeric($price[0]['price'])) {
                // Если так то перемножить цену на кол-во:
                $price = $price[0]['price'] * $array_user_order['count'];
            } else {
                // Если нет, то оставить как есть:
                $price = $price[0]['price'];
            }

            if (true) {
                $basktets_users[] = [
                    'user_id'     => $array_user_order['user_id'],
                    'name'        => $array_user_order['name'],
                    'item_name'   => $item_name[0]['name'],
                    'option_name' => $option_name[0]['option_name'],
                    'count'       => $array_user_order['count'],
                    'price'       => $price,
                    'basket_id'   => $array_user_order['basket_id']
                ];
            }
        }
echo '<pre>AdminM->basketsUsers()=$item_name:';
print_r($item_name);
echo '</pre>';

        return $basktets_users;
    }



    /**
     * @param $change_value
     */
    public function changeStatus($change_value)
    {
//echo '<pre>AdminM->changeStatus()=$change_value:';
//print_r($change_value);
//echo '</pre>';

        $change_var = $change_value['change'];

        $change_var_arr = explode('_', $change_var);
echo '<pre>AdminM->changeStatus()=$change_var:<br>';
var_dump($change_var_arr);
echo '</pre>';

        $user_name = 'Петька';
        $stat = 'принят';
        mail('artem.kuznecov.samara@gmail.com', $user_name, 'Ваш заказ был переведен в статус: '.$stat);

        // Возвращает массив с id заказа и статусом этого заказа:
        return $change_var_arr;
    }



    /**
     * Метод загрузки новой позиции на сервер и бд.
     * 
     * @param unknown $item_image
     * @param string $item_dirrectory
     * @param string $item_name
     * @param string $item_description
     */
    public function loadItem($item_image, $item_image_dir, $item_min_image_dir, $item_name, $item_category, $item_description, $item_price)
    {
        $res = PdoM::Instance() -> Select(GOODS, ITEM_NAME, $item_name, false);
// echo "<pre>";        
// var_dump($res['name']);
// echo "</pre>";
        // Если в бд отсутствует такое имя позиции:
        if ($res[ITEM_NAME] !== $item_name) {
            $object = [
                'image_dir' => $item_image_dir,
                'min_image_dir' => $item_min_image_dir,
                'name' => $item_name,
                'category' => $item_category,
                'description' => $item_description,
                'price' => $item_price
            ];
// var_dump($object);
            PdoM::Instance() -> Insert(GOODS, $object); // Передача в базу данных имени, описания и путь к изображению товара.
            // Загрузка оригинала изображения на сервер:
            if ($this -> uploadImageToServer($item_image, $item_image_dir)) {
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