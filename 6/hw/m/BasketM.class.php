<?php

class BasketM
{
    /**
     * Модель добавляет в сессию пользователя товары и их опции, а так-же в бд.
     * 
     * @param array $object объект у которого индекс = id позиции, а массив внутри содержит опции товара. (Такие как: цвет, размер и т.п.)
     */
    public static function addToBasket($object)
    {     
        // Удаляем записи в бд с соответствующим user_id и item_id
        $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . key($object);
        $res = PdoM::Instance() -> Delete(BASKETS, $where);         
//echo '<pre>'; 
//var_dump($res);
//echo '</pre>'; 
        foreach ($object as $item_id => $array_options) {
            // Разбираем опции товара.
            foreach ($array_options as $option_value) {
                $object = [
                    'item_id' => $item_id,
                    'option_id' => $option_value,
                    'user_id' => $_SESSION['user_id']
                ];
                
                $res_add_db = PdoM::Instance() -> Insert(BASKETS, $object);
//echo '<pre>';
//var_dump($res_add_db);
//echo '</pre>'; 
                $res_add_ses = $_SESSION['basket'][$item_id] = $array_options;
                header('Location: ' . $_SERVER['HTTP_REFERER']); // Обнуление $_POST
            }
        }
        if (is_numeric($res_add_db) && is_array($res_add_ses)) {
            return 'Корзина была обновлена.';
        } else {
            return 'У вас уже есть такие позиции с такими опциями в корзине.';
        }
    }
    
    /**
     * Модель должна возвращать данные корзины из бд.
     * 
     * @return array Массив данных о товарах в корзине.
     */
    public function getBasketArray($session_basket_array)
    {
        // Берем названия опций из бд:
        $res_options = PdoM::Instance()->Select(OPTIONS);
        
echo '<pre>ОПЦИИ В БД:';
var_dump($res_options);
echo '</pre>'; 

        foreach ($session_basket_array as $item_id => $curent_options_array) {
            // Выбираем все нужные позиции из бд:
            $res_items = PdoM::Instance()->Select(ITEMS, 'item_id', $item_id);
            
            foreach ($curent_options_array as $option_name => $option_value) {
                for ($i = 0; $i < count($res_options); $i++) {
                    $curent_options_array[$option_name] = $res_options[$i]['option_name'];
//                    print_r($res_options[$i]['option_name']);
                    
                }
            }
                    
echo '<pre>ТЕКУЩИЙ РАЗБИРАЕМЫЙ МАССИВ ОПЦИЙ:';
var_dump($curent_options_array);
echo '</pre>'; 
            
            // Формируем массив на выход:
            $basket_array = [
              'item_name' => $res_items['name'],
              'price' => $res_items['price'],
              'image_dir' => $res_items['image_dir'],
              'options' => $curent_options_array
            ];
            $res_basket[$item_id] = $basket_array;
        }
echo '<pre>КОРЗИНА НА ВЫХОДЕ:';
var_dump($res_basket);
echo '</pre>'; 
    }


    
}