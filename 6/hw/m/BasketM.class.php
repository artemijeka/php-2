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
     * Модель должна возвращать массив товаров и опций в корзине.
     */
    public function getBasketArray($session_basket_array)
    {
        $basket_array = [];
        foreach ($session_basket_array as $item_id => $option_array) {
            $res_items = PdoM::Instance()->Select(ITEMS, 'item_id', $item_id);
            $res_options = PdoM::Instance()->Select(OPTIONS, 'item_id', $item_id);//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
echo '<pre>';
var_dump($res);
echo '</pre>'; 
            $basket_array = [
              'item_name' => $res['name'],
              'price' => $res['price']
            ];
        }
    }
    
}