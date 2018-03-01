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
        
        foreach ($object as $item_id => $array_options) {
            // Удаляем записи в бд с соответствующим user_id и item_id
            $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . $item_id;
            // НАДО ЧТОБЫ ВЫПОЛНЯЛСЯ 1 РАЗ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            PdoM::Instance() -> Delete(BASKETS, $where); 
            
            // Разбираем опции товара.
            foreach ($array_options as $option_value) {
//                $query = "SELECT * FROM ".BASKETS." WHERE " . $where;
                // Проверка есть ли такой товар в бд.
//                $res = PdoM::Instance() -> SelectOnQuery($query);
    //                $query = "INSERT INTO " . BASKETS . " (item_id`, `option_id`, `user_id`) VALUES ($item_id, $option_value, " . $_SESSION['user_id'] . ")";
                $object = [
                    'item_id' => $item_id,
                    'option_id' => $option_value,
                    'user_id' => $_SESSION['user_id']
                ];
                
                $res_add_db = PdoM::Instance() -> Insert(BASKETS, $object);
echo '<pre>';
var_dump($res_add_db);
echo '</pre>'; 
                $res_add_ses = $_SESSION['basket'][$item_id] = $array_options;
                
//                unset($_SESSION['basket']);
                $_POST = array();
                
                if (is_numeric($res_add_db) && is_array($res_add_ses)) {
                    return 'Корзина была обновлена.';
                } else {
                    return 'У вас уже есть такие позиции с такими опциями в корзине.';
                }
echo '<pre>'; 
var_dump($res_add_ses);
echo '</pre>';   
            }
        }
    }
    

    
}