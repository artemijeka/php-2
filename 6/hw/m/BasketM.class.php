<?php

class BasketM
{
    /**
     * Модель добавляет в сессию пользователя товары и их опции и добавляет в бд данные о корзине.
     * 
     * @param array $object объект у которого индекс = id позиции, а массив внутри содержит опции товара. (Такие как: цвет, размер и т.п.)
     */
    public static function addToBasket($object)
    {        
        // Проверка есть ли такой товар в бд.
        foreach ($object as $item_id => $array_options) {
            $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . $item_id;
            $res_del = PdoM::Instance() -> Delete(BASKETS, $where);
            foreach ($array_options as $option_key => $option_value) {
                $query = "SELECT * FROM ".BASKETS." WHERE " . $where;
                $res = PdoM::Instance() -> SelectOnQuery($query);
    //                $query = "INSERT INTO " . BASKETS . " (item_id`, `option_id`, `user_id`) VALUES ($item_id, $option_value, " . $_SESSION['user_id'] . ")";
                $object = [
                    'item_id' => $item_id,
                    'option_id' => $option_value,
                    'user_id' => $_SESSION['user_id']
                ];
                $res_add = PdoM::Instance() -> Insert(BASKETS, $object);
echo '<pre>'; 
var_dump($res_add);
echo '</pre>';   
            }
        }
    }
    

    
}