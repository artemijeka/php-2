<?php
include_once '../config/config.php';

if(isset($_POST['from'])) {
	$from = strip_tags($_POST['from']);
	$to = strip_tags($_POST['to']);
	
	$dbMore = new PDO(DB_CONNECT,DB_USER,DB_PASSWORD);
	$resMore = $dbMore->query('SELECT * FROM products_table LIMIT '.$from. ','. $to);
	while($rowMore = $resMore->fetch()){
		$resultMore[] = $rowMore;
	}
	$resultMoreEnd = json_encode($resultMore);
	print_r($resultMoreEnd);
}


