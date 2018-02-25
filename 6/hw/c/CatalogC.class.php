<?php
/**
 * Контроллер отвечающий за обработку каталога.
 */
class CatalogC extends BaseC
{
    /**
     * Метод получает каталог и выводит его в шаблон.
     */
    public function getCatalog()
    {
        $catalog = new CatalogM();
        $items_arrays = $catalog -> getCatalog();

        $this -> title .= " | Каталог";
        
echo "<pre>";
var_dump($items_arrays);
echo "</pre>";
        
        if ($this -> isPost()) {
            BasketM::addToBasket($_POST); // Добавляем в корзину товары и их опции.
        }

        foreach ($items_arrays as $array) {
            $vars = array( // В переменных должны выводиться вся информация о товарах в виде массива.
                'array_items' => $array,
                'item_option_a' => ITEM_OPTION_A,
                'item_option_b' => ITEM_OPTION_B,
                'buy' => BUY
            );
            MyTwigM::myTwigTemplate('catalog.twig', $vars);
        }
echo "<pre>Сессия:";
print_r($_SESSION);
echo "</pre>";
echo "<pre>Пост:";
print_r($_POST);
echo "</pre>";
// print_r($_SERVER);
    }
    
    
    
}