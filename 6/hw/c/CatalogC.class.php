<?php

class CatalogC
{
    public function getCatalog()
    {
        $vars = array( // В переменных должны выводиться вся информация о товарах в виде массива.
            'items_array' => $items_array
        );
        MyTwigM::myTwigTemplate('catalog.twig', $vars);
    }
}