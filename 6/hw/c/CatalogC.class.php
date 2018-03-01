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
		$catalog      = new CatalogM();
		$items_arrays = $catalog->getCatalog();

		$this->title .= " | Каталог";

		echo "<pre>";
		var_dump($items_arrays);
		echo "</pre>";

		// Добавляем в корзину товары и их опции.
		if ($this->isPost()) {
                    $res_add = BasketM::addToBasket($_POST);
		}

		// В переменных должны выводиться вся информация о товарах в виде массива.
		foreach ($items_arrays as $option_array) {
			$vars = array(
				'array_items'    => $option_array,
				'value_option_a' => VALUE_OPTION_A, // 0
				'value_option_b' => VALUE_OPTION_B, // 1
				'name_option_a'  => NAME_OPTION_A,
				'name_option_b'  => NAME_OPTION_B,
				'buy'            => BUY
			);
                        if ($this ->isPost()) $vars['res_add'] = $res_add;
			MyTwigM::myTwigTemplate('catalog.twig', $vars);
		}

		echo "<pre>CatalogC - Сессия:";
		print_r($_SESSION);
		echo "</pre>";
		echo "<pre>CatalogC - Пост:";
		print_r($_POST);
		echo "</pre>";
		// print_r($_SERVER);
		// unset($_SESSION['basket']);
	}

}