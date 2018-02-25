<?php

class BasketM
{
    /**
     * Модель добавляет в сессию пользователя товары и их опции.
     * 
     * @param array $object объект у которого индекс = id позиции, а массив внутри содержит опции товара. (Такие как: цвет, размер и т.п.)
     */
    public static function addToBasket($object)
    {
        foreach ($object as $item_name => $array_options) {
            $_SESSION['basket'][$item_name] = $array_options;
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