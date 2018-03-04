<?php

class BasketM
{
    /**
     * Модель добавляет в сессию пользователя товары и их опции, а так-же в бд.
     * 
     * @param array $object Объект у которого индекс = id позиции, а массив внутри содержит опции товара. (Такие как: цвет, размер и т.п.)
     */
    public static function addToBasket($object)
    {     
        // Удаляем записи в бд с соответствующим user_id и item_id
        $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . $object['item_id'];
        PdoM::Instance()->Delete(BASKETS, $where);         
echo '<pre>BasketM - Объект ПОСТ:'; 
print_r($object);
echo '</pre>'; 

            // Формируем объект который пошлем в бд.
            $basket_object[$object['item_id']] = [
                'item_id'       => $object['item_id'],
                'count'         => $object['count'],
                'option_id'     => $object['option_id'],
                'user_id'       => $_SESSION['user_id']
            ];
echo '<pre>BasketM - Объект идущий в бд и в сессию:'; 
print_r($basket_object[$object['item_id']]);
echo '</pre>'; 

            // Передача объекта (асс. масс.) в бд.
            PdoM::Instance()->Insert(BASKETS, $basket_object[$object['item_id']]);
//echo '<pre>';
//var_dump($res_add_db);
//echo '</pre>';
//
            // Обновляем данные в сессии.
            $_SESSION['basket'][$object['item_id']] = [
                'item_id'       => $object['item_id'],
                'count'         => $object['count'],
                'option_id'     => $object['option_id']
            ];
            
            // Обнуление $_POST путем передачи заголовка: 'Вернуться на туже страницу' - то есть перезагрузка страницы.
            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    /**
     * Модель должна возвращать данные корзины из бд.
     * 
     * @return array Массив данных о товарах в корзине.
     */
    public function getBasketArray($session_basket_array)
    {
        
echo '<pre>BasketM - СЕССИЯ ДО:';
print_r($session_basket_array);
echo '</pre>'; 
        // Берем данные об опциях из бд:
        $options = PdoM::Instance()->Select(OPTIONS);
        // Берем данные об корзине из бд:
        $basket = PdoM::Instance()->Select(BASKETS, 'user_id', $_SESSION['user_id'], true);
        // Берем данные об позициях из бд:
        $items = PdoM::Instance()->Select(ITEMS, true);
        
        
echo '<pre>';
print_r($items);
echo '</pre>';

        // Перебираем сессию корзины на id позиции => массив заказанных опций.
        foreach ($session_basket_array as $item_id => $curent_options_array) {
            // Перебираем значения массива заказанных опций позиции.
            foreach ($curent_options_array as $option_name => $option_value) {
                // Нужно заменить в поступившем массиве опций id опций на их значения из бд.
                for ($i=0; $i<count($options); $i++) {
                    if ($option_value == $i) {
                        $curent_options_array[$option_name] = $options[$i]['option_name'];
//print_r($curent_options_array);
                    } else {
                        continue;
                    }
                }
            }
                    
echo '<pre>ТЕКУЩИЙ РАЗБИРАЕМЫЙ МАССИВ ОПЦИЙ:';
print_r($curent_options_array);
echo '</pre>'; 
            
            // Формируем массив на выход:
            $basket_array = [
              'item_name' => 0,
              'price' => 0,
              'image_dir' => 0,
              'options' => $curent_options_array
            ];
            $res_basket[$item_id] = $basket_array;
        }
echo '<pre>КОРЗИНА НА ВЫХОДЕ:';
print_r($res_basket);
echo '</pre>'; 
    }


    
}