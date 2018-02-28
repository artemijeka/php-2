<div class="screen-main--products-title">ALL PRODUCTS</div>
<ul class="screen-main--products-template">
    <?php if (isset($allProduct)): ?>
	<?php foreach ($allProduct as $key => $value) : ?>
	<li>
		<a href="<?= ROOT.'index/single/?s='.$value['id'] ?>">
			<div class="product-img">
				<img src="v/assets/<?= $value['path_mini'] ?>">
			</div>
			<div class="product-name-and-price">
				<div><?= $value['name_mini'] ?></div>
				<div>
					<span class="product-price">&#8364;.<?= $value['price'] ?></span><br>
					<!--<span class="product-old-price">
						<span class="product-price">&#8364;.865.00</span>
					</span>-->
				</div>
			</div>
		</a>
	</li>
	<?php endforeach; ?>
    <?php endif; ?>
</ul>

<div class="show-more">Показать еще</div>
<div class="result"></div>
