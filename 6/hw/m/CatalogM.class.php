<?php
/**
 * Класс для работы с каталогом.
 * 
 * @author Артем Кузнецов
 */
class CatalogM
{
    /**
     * 
     */
    public function getCatalog()
    {
        $res = PdoM::Instance() -> Select(GOODS);
// echo "<pre>";        
// var_dump($res);
// echo "</pre>";
        return $res;
    }
  
    
    
}