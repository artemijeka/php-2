<?php

class BasketM
{
    /**
     * Модель добавляет в сессию пользователя товары и их опции, а так-же в бд.
     * 
     * @param array $object_post Объект у которого индекс = id позиции, а массив внутри содержит опции товара. (Такие как: цвет, размер и т.п.)
     */
    public static function addToBasket($object_post)
    {     
echo '<pre>BasketM - $object_post:';
print_r($object_post);
echo '</pre>';
        // Узнаем id и удаляем записи в бд с соответствующим user_id и item_id и option_id
        /** @var string $where условие WHERE для запроса */
        $where = "`user_id`=" . $_SESSION['user_id'] . " AND `item_id`=" . $object_post['item_id'] . " AND `option_id`=" . $object_post['option_id'];
        $res_query = PdoM::Instance()->Select(BASKETS, $where, true);
        PdoM::Instance()->Delete(BASKETS, $where);
echo '<pre>BasketM - $res_query:';
print_r($res_query);
echo '</pre>';

        // Удаляем записи в сессии с соответствующим user_id и item_id и option_id
        unset($_SESSION['basket'][$res_query['basket_id']]);

        // Формируем объект который пошлем в бд.
        $basket_object[$object_post['item_id']] = [
            'item_id' => $object_post['item_id'],
            'count'     => $object_post['count'],
            'option_id' => $object_post['option_id'],
            'user_id'   => $_SESSION['user_id']
        ];
echo '<pre>BasketM - Объект идущий в бд и в сессию:';
print_r($basket_object[$object_post['item_id']]);
echo '</pre>';

        // Передача объекта (асс. масс.) в бд.
        PdoM::Instance()->Insert(BASKETS, $basket_object[$object_post['item_id']]);
//echo '<pre>';
//var_dump($res_add_db);
//echo '</pre>';

        // Берем данные о корзине из бд:
        $query = "SELECT * FROM `".BASKETS."` LEFT JOIN `".ITEMS."` ON `".BASKETS."`.`item_id` = `ITEMS`.`item_id` WHERE "."`".BASKETS."`.`item_id`=".$object_post['item_id'];
        $basket_db = PdoM::Instance()->MyQuery($query, true);

        // Переносим новые значения из бд в сессию:
        foreach ($basket_db as $ind=>$array) {
echo '<pre>BasketM - $basket_db:';
print_r($basket_db);
echo '</pre>';
            // Обновляем данные в сессии.
//unset($_SESSION['basket'])
            $_SESSION['basket'][$basket_db[$ind]['basket_id']] = [
                'item_id'   => $array['item_id'],
                'item_name' => $array['name'],
                'count'     => $array['count'],
                'option_id' => $array['option_id'],
                'price'     => $array['price']
            ];
        }

        // Обнуление $_POST путем передачи заголовка: 'Вернуться на туже страницу' - то есть перезагрузка страницы.
//        header('Location: ' . $_SERVER['HTTP_REFERER']);
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
        $name_options_by_id = PdoM::Instance()->Select(OPTIONS, true);
echo '<pre>$name_options_by_id:';
print_r($name_options_by_id);
echo '</pre>';

        // Перебираем сессию корзины.
        foreach ($basket_session as $basket_id=>$basket_value) {
            for ($i=0; $i<count($name_options_by_id); $i++) {
                if ($basket_session[$basket_id]['option_id'] == $name_options_by_id[$i]['option_id']) {
                    $basket_session[$basket_id]['option_name'] = $name_options_by_id[$i]['option_name'];
                }
            }
        }
//echo '<pre>КОРЗИНА НА ВЫХОДЕ:';
//print_r($basket_session);
//echo '</pre>'; 
        
        return $basket_session;
    }


    
}