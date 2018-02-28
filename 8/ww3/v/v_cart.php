<h1>Корзина</h1>

<?php if(isset($getProdForCart)) : ?>
<?php for($i = 0; $i < count($getProdForCart); $i++): ?>
<div class="cart--list">
    <div class="cart--list-name"><?= $getProdForCart[$i][0]['name_mini'] ?></div>
    <div class="cart--list-img">
        <img src="<?= ROOT .'/v/assets/'.$getProdForCart[$i][0]['path_full'] ?>">
    </div>
    <div class="cart--list-price"><?= $getProdForCart[$i][0]['price'] ?></div>
    <div class="cart--list-counter" count="<?= $i ?>">
        <div style="margin-top: 0;" class="product-counter-and-add">
			<div style="width: 100%;" class="counter" ondblclick="return false" onselectstart="return false" onmousedown="return false">
				<span class="cart-minus">&ndash; </span> <input type="text" value="<?= $countArray[$i][1] ?>"> <span class="cart-plus"> +</span>
			</div>
		</div>
    </div>
    <div class="cart--list-delete">
        <span class="cart-delete-prod">Удалить</span>
    </div>
</div>
<?php endfor; ?>
<?php else: ?>
    <?= $message ?>
<?php endif; ?>

<?php if(!isset($message)): ?>
    <a class="go-order" href="<?= ROOT ?>cart/order/">Оформить заказ</a>
<?php endif; ?>

<a class="back--cart" href="<?= ROOT ?>">Вернуться в каталог</a>

