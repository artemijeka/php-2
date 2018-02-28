<?php
include_once '../config/config.php';
include_once '../m/SQL.php';


$valid_counter = false;
if($_POST['order_name'] == ''){
	echo 'ОШИБКА! Не заполнено поле ввода с именем <br>';
	$valid_counter = false;
}else{
	preg_match(
		'~[а-яА-яёЁa-zA-Z\s]{2,30}~u',
		$_POST['order_name'],
		$order_name_preg
	);
	$valid_counter = true;
	$order_name = trim(strip_tags($order_name_preg[0]));
}

if($_POST['order_phone'] == ''){
	echo 'ОШИБКА! Не заполнено поле ввода номера телефона <br>';
	$valid_counter = false;
}else{
	preg_match(
		'~[0-9\+\-\(\)\s\S]{7,18}~u',
		$_POST['order_phone'],
		$order_phone_preg
	);
	$valid_counter = true;
	$order_phone = trim(strip_tags($order_phone_preg[0]));
}



if($_POST['order_email'] == ''){
	echo 'ОШИБКА! Не заполнено поле ввода электронной почты <br>';
	$valid_counter = false;
}else{
	preg_match(
		'~^[a-zA-Z0-9\._\-]+@[a-zA-Z0-9\._\-]+\.[a-zA-Z0-9]{1,6}~u',
		$_POST['order_email'],
		$order_email_preg
	);
	$valid_counter = true;
	$order_email = trim(strip_tags($order_email_preg[0]));
}


if($_POST['order_address'] == ''){
	echo 'ОШИБКА! Не заполнено поле ввода сообщения <br>';
	$valid_counter = false;
}else{
	$valid_counter = true;
	$order_address = trim(strip_tags($_POST['order_address']));
}

if($_POST['order_user'] == ''){
	echo 'ОШИБКА! Не определен юзер. Залогиньтесь в системе <br>';
	$valid_counter = false;
}else{
	$valid_counter = true;
	$order_user = trim(strip_tags($_POST['order_user']));
}

$prodList = $_POST['ord'];

if($valid_counter){
	$newOrderObj = SQL::Instance()->Insert("orders_table", array('id'=>null,
                                                                'fio'=>$order_name,
                                                                'number'=>$order_phone,
                                                                'address'=>$order_address,
                                                                'products_list'=>$prodList,
                                                                'status'=>'new',
                                                                'user_id'=>$order_user));
    if($newOrderObj){
        echo 'Ваш заказ принят! Скоро наш менеджер свяжетс с вами';
    }
}
