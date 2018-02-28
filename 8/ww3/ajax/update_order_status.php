<?php 
include_once '../config/config.php';
include_once '../m/SQL.php';

$newOrderStatus = $_POST['order-status-select'];
$orderUpdateId = $_POST['update-id'];

$updateOrderStr = SQL::Instance()->Update('orders_table', array('status'=>$newOrderStatus), "id='$orderUpdateId'");

if ($updateOrderStr) {
	echo "Статус заказа успешно изменен";
}else{
	echo "Что-то пошло не так";
}

?>