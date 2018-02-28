<h1>Редактируем товар</h1>
<br><br>
<a href="/my_shop/manager">Вернуться в админку</a>

 <?php if (isset($editProd)): ?>
<form style="margin-top: 20px;" method="post" enctype="multipart/form-data">
	<input type="text" name="edit_name_mini" value="<?= $editProd[0]['name_mini'] ?>" placeholder="Введите короткое название товара" style="height: 30px; width: 80%;" required> <br><br>

	<input type="text" name="edit_name_full" value="<?= $editProd[0]['name_full'] ?>" placeholder="Введите полное название товара" style="height: 30px; width: 80%;" required> <br><br>

	<input type="text" name="edit_price" value="<?= $editProd[0]['price'] ?>" placeholder="Введите стоимость товара" style="height: 30px; width: 80%;" required> <br><br>

	<textarea style="height: 100px; width: 80%;" name="edit_description" placeholder="Введите описание товара" required><?= $editProd[0]['description'] ?></textarea> <br><br>

	<input type="file" name="edit_photo">

	<input type="submit" name="edit_submit">
</form>
<?php endif; ?>
