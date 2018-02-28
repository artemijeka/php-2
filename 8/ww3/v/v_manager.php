<h1>АДМИНКА</h1>
<h3>Все товары</h3>

<ul class="manager--all-list">
 <?php if (isset($allProd)): ?>
	<?php foreach ($allProd as $key => $value) : ?>
	<li>
		<div class="manager--list-img">
			<img src="/my_shop/v/assets/<?= $value['path_mini'] ?>">
		</div>
		<div class="manager--list-name">
			<?= $value['name_mini'] ?>
		</div>
		<div class="manager--list-price">
			<span class="product-price">&#8364;.<?= $value['price'] ?></span><br>
		</div>
		<div class="manager--list-delete">
			<a href="/my_shop/manager/delete/?d=<?= $value['id'] ?>">Удалить</a>
		</div>
		<div class="manager--list-create">
			<a href="/my_shop/manager/edit/?e=<?= $value['id'] ?>">Редактировать</a>
		</div>
	</li>
	<hr>
	<?php endforeach; ?>
    <?php endif; ?>
</ul>


<h3 style="margin-top: 35px;">Добавьте новый товар</h3>

<form style="margin-top: 20px;" method="post" enctype="multipart/form-data">
	<input type="text" name="add_name_mini" placeholder="Введите короткое название товара" style="height: 30px; width: 80%;" required> <br><br>

	<input type="text" name="add_name_full" placeholder="Введите полное название товара" style="height: 30px; width: 80%;" required> <br><br>

	<input type="text" name="add_price" placeholder="Введите стоимость товара" style="height: 30px; width: 80%;" required> <br><br>

	<textarea style="height: 100px; width: 80%;" name="add_description" placeholder="Введите описание товара" required></textarea> <br><br>

	<input type="file" name="add_photo">

	<input type="submit" name="add_submit">
</form>


<h3 style="margin-top: 35px;">Заказы</h3>
<ul class="manager-orders">
    <li><b>id</b></li>
    <li><b>Имя заказчика</b></li>
    <li><b>Номер телефона</b></li>
    <li><b>Адрес</b></li>
    <li><b>Заказ (id:количество)</b></li>
    <li><b>Статус заказа</b></li>
</ul>
<?php foreach($orders as $key=>$value): ?>
    <ul class="manager-orders">
        <li><?= $value['id']; ?></li>
        <li><?= $value['fio']; ?></li>
        <li><?= $value['number']; ?></li>
        <li><?= $value['address']; ?></li>
        <li><?= $value['products_list']; ?></li>
        <li>
            <form method="post" id="order_status_form">
                <select name="order-status-select">
                    <option <?= $value['status'] == 'wait' ? 'selected' : '' ?> name="wait" value="wait">Обработка</option>
                    <option <?= $value['status'] == 'new' ? 'selected' : '' ?> name="new" value="new">Новый</option>
                    <option <?= $value['status'] == 'done' ? 'selected' : '' ?> name="done" value="done">Доставлен</option>
                </select>
                <input update-id="<?= $value['id'] ?>" class="order_status_submit" type="submit" name="order_status_submit" value="Изменить">
            </form>
        </li>
    </ul>
<?php endforeach; ?>