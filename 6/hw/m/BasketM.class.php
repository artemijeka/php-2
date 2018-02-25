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
        foreach ($object as $item_id => $array_options) {
            $_SESSION['basket'][$item_id] = $array_options;
        }
        header("Location: ".$_SERVER['HTTP_REFERER']); // После стираем $_POST.
// unset($_SESSION['basket']);
    }
    
    
    
}