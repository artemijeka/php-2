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
                'item_id' => $object['item_id'],
                'count'     => $object['count'],
                'option_id' => $object['option_id'],
                'user_id'   => $_SESSION['user_id']
            ];
echo '<pre>BasketM - Объект идущий в бд и в сессию:'; 
print_r($basket_object[$object['item_id']]);
echo '</pre>'; 

            // Передача объекта (асс. масс.) в бд.
            PdoM::Instance()->Insert(BASKETS, $basket_object[$object['item_id']]);
//echo '<pre>';
//var_dump($res_add_db);
//echo '</pre>';
            
            // Берем данные о корзине из бд:
            $query = "SELECT * FROM `".BASKETS."` LEFT JOIN `".ITEMS."` ON `".BASKETS."`.`item_id` = `ITEMS`.`item_id` WHERE "."`".BASKETS."`.`item_id`=".$object['item_id'];
            $basket_db = PdoM::Instance()->SelectOnQuery($query, true);
echo '<pre>BasketM - $basket_db:'; 
print_r($basket_db);
echo '</pre>';             
            
            foreach ($basket_db as $ind=>$array) {
                // Обновляем данные в сессии.
                $_SESSION['basket'][$array['item_id']] = [
                    'item_name' => $array['name'],
                    'count'     => $array['count'],
                    'option_id' => $array['option_id']
                ];
            }
            
            // Обнуление $_POST путем передачи заголовка: 'Вернуться на туже страницу' - то есть перезагрузка страницы.
//            header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    
    /**
     * Модель должна возвращать контент корзины из бд.
     * 
     * @return array Массив данных о товарах в корзине.
     */
    public function getContentForBasket($basket_session)
    {        
echo '<pre>BasketM - СЕССИЯ ДО:';
print_r($basket_session);
echo '</pre>'; 

        // Берем данные об опциях из бд:
        $options = PdoM::Instance()->Select(OPTIONS);
        // Берем данные об корзине из бд:
        $basket = PdoM::Instance()->Select(BASKETS, 'user_id', $_SESSION['user_id'], true);
        // Берем данные об позициях из бд:
        $items = PdoM::Instance()->Select(ITEMS, true);
echo '<pre>$options, $items:';
print_r($options);
print_r($items);
echo '</pre>';

        // Перебираем сессию корзины на id позиции => массив заказанных опций.
        foreach ($basket_session as $item_id => $current_options_array) {
            // Перебираем значения массива заказанных опций позиции.
            foreach ($current_options_array as $key => $value) {
                // Нужно создать объект корзины с пригодными данными для вывода в браузер:
//                $basket_content_array[$item_id]['item_name'] = 
            }
echo '<pre>ТЕКУЩИЙ РАЗБИРАЕМЫЙ МАССИВ ОПЦИЙ:';
print_r($current_options_array);
echo '</pre>';
            
        }
//echo '<pre>КОРЗИНА НА ВЫХОДЕ:';
//print_r($basket_session);
//echo '</pre>'; 
        
        return $basket_content_array;
    }


    
}