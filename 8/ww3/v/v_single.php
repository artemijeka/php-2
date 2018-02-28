
<?php if(isset($product)): ?>
<h1><?= $product[0]['name_full'] ?></h1>
<div class="single--main">
	<div>
		<div class="single--img">
			<img src="<?= ROOT ?>v/assets/<?= $product[0]['path_full'] ?>" alt="">
		</div>
		<div class="product-counter-and-add">
			<div class="counter" ondblclick="return false" onselectstart="return false" onmousedown="return false">
				<span class="minus">&ndash; </span> <input type="text" value="1"> <span class="plus"> +</span>
			</div>
			<div class="add" how="1" id="<?= $product[0]['id'] ?>">
				<span>В корзину</span>
			</div>
		</div>
	</div>
	<div>
		<h3>Описание товара</h3>
		<p><?= $product[0]['description'] ?></p>
        <p>Стоимость: &#8364;<?= $product[0]['price'] ?></p>
	</div>
</div>
<div class="back-to-index">
	<a href="<?= ROOT ?>">Назад к каталогу</a>
</div>

<?php endif; ?>