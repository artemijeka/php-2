<?php if(isset($message)): ?>
    <div style="margin-top: 35px; font-size: 20px;"><?= $message ?></div>
<?php elseif(isset($_COOKIE['cart'])): ?>
    <h1>Введите данные для оформления заказа</h1>
    <form method="post" id="order_form">
        <input type="text" name="order_name" class="order_name" placeholder="Ваше ФИО"><br>
        <input type="text" name="order_phone" class="order_phone" placeholder="Ваш номер телефона"><br>
        <input type="text" name="order_email" class="order_email" placeholder="Ваш Email"><br>
        <textarea name="order_address" class="order_address" placeholder="Адрес доставки"></textarea><br>
        <input type="text" name="order_user" value="<?= $_SESSION['id'] ?>" hidden>
        <input type="submit" class="order_submit" value="Оформить заказ">
    </form>
    <a class="back--cart" href="<?= ROOT ?>cart/">Вернуться в корзину</a>
<?php endif; ?>