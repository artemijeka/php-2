
<?php if(!isset($_SESSION['login'])): ?>
    <h2>Вы не залогинились в системе. <a href="<?= ROOT ?>user/signin/">Войти</a></h2>
<?php elseif(isset($_SESSION['login']) && isset($orders)): ?>
    <h2>Ваши заказы</h2>
    <h3>Вы сделали <?= count($orders) ?> заказ(ов):</h3>
    <?php foreach($orders as $key=>$value): ?>
<br><br>
        <h4>Заказ номер <?= $key+1 ?></h4>
        <?php foreach($value as $newKey=>$newValue): ?>
            <ul class="room-order" style="margin-top: 25px;">
            <?php foreach($newValue as $endKey=>$endValue): ?>
                <li>Товар: <?= $endValue['name_mini']; ?></li>
                <li>Количество: <?= $orderCount[$key][$newKey][1]; ?></li>
                <li>Стоиомсть за 1шт.: <?= $endValue['price']; ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endforeach; ?>
        <div>Дата заказа: <?= $status[$key]['date']; ?></div>
        <div>Статус заказа: <?= $status[$key]['status']; ?></div>
    <?php endforeach; ?>
<?php else: ?>
    <h1><?= $message ?></h1>
<?php endif; ?>

<br><br>
<a href="<?= ROOT ?>">Перейти в каталог</a>