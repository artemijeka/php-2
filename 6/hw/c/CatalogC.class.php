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
        
echo "<pre>";
var_dump($items_arrays);
echo "</pre>";
        
        $this -> title .= " | Каталог";
        
        foreach ($items_arrays as $index => $array) {
            $vars = array( // В переменных должны выводиться вся информация о товарах в виде массива.
                'array_items' => $array
            );
            MyTwigM::myTwigTemplate('catalog.twig', $vars);
        }
    }
    
    
    
}