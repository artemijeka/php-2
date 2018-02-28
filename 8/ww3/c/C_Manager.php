<?php

class C_Manager extends C_Base{
	//
    // Конструктор
    //
    
	public function action_index(){
		$this->title .= '- Админка';
		include_once 'm/manager_signin.php';
		include_once 'm/manager_models.php';
		if (isset($_SESSION['privelege']) && $_SESSION['privelege'] == '1') {
			$managerObj = new MANAGER();
			$allProd = $managerObj->manShowAllProd();
			$this->content = $this->Template('v/v_manager.php', array('allProd' => $allProd, 'orders'=>$allOrdersObj));
		}else{
			$this->content = $this->Template('v/v_manager_form.php');
		}
	}
	public function action_delete(){
		$this->title .= '- Админка';
		include_once 'm/manager_models.php';
	}
	public function action_edit(){
		$this->title .= '- Админка';
		include_once 'm/manager_models.php';
		//**** Берем данные для редактирования
		if (isset($_GET['e'])) {
			if ($_SESSION['privelege'] == '1') {
				$editObj = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$_GET[e]'");
			}else{
				echo "Недостаточно прав";
			}
		}
		$this->content = $this->Template('v/v_manager_edit.php', array('editProd' => $editObj));
	}
}