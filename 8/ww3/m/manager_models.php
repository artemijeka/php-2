<?php
//**************************************************
// **** Удаляем товар
//**************************************************
if (isset($_GET['d'])) {
	if ($_SESSION['privelege'] == '1') {
		$deleteObj = SQL::Instance()->Delete("products_table", "id='$_GET[d]'");
		if ($deleteObj) {
            $deleteFolderDir = 'v/assets/img/product/' .$_GET['d'];
            $deleteFolderObj = new deleteFolder();
            $deleteFolderAct = $deleteFolderObj->rrmdir($deleteFolderDir);
            if($deleteFolderAct){
                header("Location: " .ROOT ."manager/");
            }
		}
	}else{
		echo "Недостаточно прав";
	}
}
//***************************************************
// **** Сохраняем изменения
//**************************************************
if (isset($_POST['edit_submit'])) {
	$updateNameMini = $_POST['edit_name_mini'];
	$updateNameFull = $_POST['edit_name_full'];
	$updatePrice = $_POST['edit_price'];
	$updateDescription = $_POST['edit_description'];

/*Если новое изображение не выбрано, то пути не трогаем, просто делаем апдейт*/
	if ($_FILES['edit_photo']['size'] == 0) {

		$editObj = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$_GET[e]'");
		$oldPathMini = $editObj[0]['path_mini'];
		$oldPathFull = $editObj[0]['path_full'];
		$oldProdId = $editObj[0]['id'];

		$updateObj = SQL::Instance()->Update("products_table", array('id'=>$oldProdId,
																						 'name_mini'=>$updateNameMini,
																						 'name_full'=>$updateNameFull,
																						 'path_mini'=>$oldPathMini,
																						 'path_full'=>$oldPathFull,
																						 'description'=>$updateDescription,
																						 'price'=>$updatePrice), "id='$_GET[e]'");
		if ($updateObj) {
			header("Location: " .ROOT ."manager/");
		}
//Если пытаемся изменить изображение, то удаляем старые фото и делаем апдейт вместе с новыми фотками
	}else{
		$translateObj = new TranslateToLat();
		$updateLatName = $translateObj->translate($_FILES['edit_photo']['name']);
		$updatePath = "img/product/" .$_GET['e'] ."/" . $updateLatName;
		$updateThumb = "img/product/" .$_GET['e'] ."/mini." . $updateLatName;
		$updateSize = $_FILES['edit_photo']['size'];

		$fileDir = "v/assets/img/product/".$_GET['e']."/";
		$scanDir = scandir($fileDir);

		foreach ($scanDir as $value) {
			if ($value == '.' || $value == '..') continue;

			unlink($fileDir.$value);
		}
		if ($updateSize < 3000000 && $_FILES['edit_photo']['type'] == 'image/jpeg' || $_FILES['edit_photo']['type'] == 'image/gif' || $_FILES['edit_photo']['type'] == 'image/png') {

			if (copy($_FILES['edit_photo']['tmp_name'], "v/assets/".$updatePath)) {

				$createThumbnail = new createThumbnail("v/assets/".$updatePath, "v/assets/".$updateThumb, '300', '300');

				if ($createThumbnail) {

					$editObj = SQL::Instance()->Select("SELECT * FROM products_table WHERE id='$_GET[e]'");
					$oldPathMini = $editObj[0]['path_mini'];
					$oldPathFull = $editObj[0]['path_full'];
					$oldProdId = $editObj[0]['id'];

					$updateObj = SQL::Instance()->Update("products_table", array('id'=>$oldProdId,
																						 'name_mini'=>$updateNameMini,
																						 'name_full'=>$updateNameFull,
																						 'path_mini'=>$updateThumb,
																						 'path_full'=>$updatePath,
																						 'description'=>$updateDescription,
																						 'price'=>$updatePrice), "id='$_GET[e]'");

						if ($updateObj) {
							header("Location: " .ROOT ."manager/");
						}
				}
			}
		}
	}
}

//************************************************
//**** Добавляем товар
//***********************************************
if (isset($_POST['add_submit'])) {
	$interpretTo = new TranslateToLat();
	$toLatName = $interpretTo->translate($_FILES['add_photo']['name']);
	$prodNameMini = $_POST['add_name_mini'];
	$prodNameFull = $_POST['add_name_full'];
	$prodPrice = $_POST['add_price'];
	$prodDescr = $_POST['add_description'];
	$photoSize = $_FILES['add_photo']['size'];

	$showIdLastProduct = SQL::Instance()->Select("SELECT id FROM products_table ORDER BY id DESC LIMIT 1");

	/*Если записей в базе нет, то имя папки с изображениями будет 1*/
	if (!$showIdLastProduct) {
		$folderNameCreate = '1';
	}else{
		$folderNameCreate = $showIdLastProduct[0]['id'] + 1;
	}

	$savePath = "img/product/" .$folderNameCreate ."/" . $toLatName; // Путь куда сохраняем большое изображение
	$saveThumb = "img/product/" .$folderNameCreate ."/mini." . $toLatName;

	if (mkdir("v/assets/img/product/" .$folderNameCreate ."/", 0755)) {
		if ($photoSize < 3000000 && $_FILES['add_photo']['type'] == 'image/jpeg' || $_FILES['add_photo']['type'] == 'image/gif' || $_FILES['add_photo']['type'] == 'image/png') {

			if (copy($_FILES['add_photo']['tmp_name'], 'v/assets/'.$savePath)) {

				$createThumb = new createThumbnail("v/assets/".$savePath, "v/assets/".$saveThumb, '300', '300');

			if ($createThumb) {

				$addNewProduct = SQL::Instance()->Insert("products_table", array('id'=>null,
                                                                                  'name_mini'=>$prodNameMini,
                                                                                  'name_full'=>$prodNameFull,
                                                                                  'path_mini'=>$saveThumb,
                                                                                  'path_full'=>$savePath,
                                                                                  'description'=>$prodDescr,
                                                                                  'price'=>$prodPrice,
                                                                                  'see_counter'=>'0'));


				if ($addNewProduct) {
					echo $addNewProduct;

					/* Если имя папки не совпадает с только что добавленным товаром(таблица очищена и id начинаются не с 1), то
					переименовываем папку, чтобы имя совпадало с id, а так же делаем апдейт
					базы изменив пути к изображениям */
					if ($addNewProduct != $folderNameCreate) {

						if (rename("v/assets/img/product/" .$folderNameCreate, "v/assets/img/product/" .$addNewProduct)) {

							$folderNameCreate = $addNewProduct;
							$savePath = "img/product/" .$folderNameCreate ."/" . $toLatName;
							$saveThumb = "img/product/" .$folderNameCreate ."/mini." . $toLatName;
                     $renameId = $addNewProduct;

                            /*=== Делаем update записи ===*/
                            $updateNewProductF = SQL::Instance()->Update("products_table", array('id'=>$renameId,
                                                                                                 'name_mini'=>$prodNameMini,
                                                                                                 'name_full'=>$prodNameFull,
                                                                                                 'path_mini'=>$saveThumb,
                                                                                                 'path_full'=>$savePath,
                                                                                                 'description'=>$prodDescr,
                                                                                                 'price'=>$prodPrice), "id='$renameId'");
							if ($updateNewProductF) {
								header("Location: " .ROOT ."manager/");
							}
						}
					}else{
						header("Location: " .ROOT ."manager/");
					}
				}
			}
		}
	}
}
}

/*Получаем массив со всеми заказами*/
$allOrdersObj = SQL::Instance()->Select("SELECT * FROM orders_table");



				