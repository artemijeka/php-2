<?php
//
// Конттроллер страницы чтения.
//

class C_Page extends C_Base
{
	//
	// Конструктор.
	//

	public function action_index(){
		$this->title .= '- Главная';
		$obj = new showThreeProduct();
		$showThreeProd = $obj->showThree();
		$this->content = $this->Template('v/v_index.php', array('allProduct' => $showThreeProd));
	}
	public function action_single(){
		if(isset($_GET['s'])) {
			$singleObj = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$_GET[s]'");
			$this->title .= '- ' .$singleObj[0]['name_mini'];
			$this->content = $this->Template('v/v_single.php', array('product' => $singleObj));
		}
	}
}
