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
        foreach ($object as $item_id => $array_options) {
            $_SESSION['basket'][$item_id] = $array_options;
// var_dump($item_id, true);
// var_dump($array_options[0], true);
// var_dump($_SESSION['user_id'], true);
            
            foreach ($array_options as $option) {
                $object = [
                    'item_id' => $item_id,
                    'option_id' => $option,
                    'user_id' => (int)$_SESSION['user_id']
                ];
                
                // Проверка нет ли такой корзины.
//                 $queryRes = PdoM::Instance()->Select(BASKETS, 'user_id', $object['user_id']);
// echo '<pre>Select:';
// var_dump($queryRes);
// echo '</pre>'; 

                PdoM::Instance() -> Insert(BASKETS, $object);
            }
        }
        header("Location: ".$_SERVER['HTTP_REFERER']); // После стираем $_POST.
// unset($_SESSION['basket']);
    }
    
    /**
     * Модель возвращает ассоциативный массив с ключом - именем позиции и значением массив его опций.
     * 
     * @param array $basket_obj объект из сессии с данными корзины.
     */
//     public function getBasket($basket_obj) {
// echo '<pre>';       
// var_dump($_SESSION);
// echo '</pre>';
//         foreach ($basket_obj as $item_id => $option_array) {

//             $item_info = PdoM::Instance()->Select(GOODS, 'id', $item_id);
//             $item_id = $item_info['name'];
// echo '<pre>';
// var_dump($basket_obj);
// echo '</pre>';
//         }
//     }
    
    
    
}