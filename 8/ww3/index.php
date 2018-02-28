<?php
session_start();
ob_start('ob_gzhandler');

include_once 'config/config.php';
include_once 'autoload.php';


$url_array = explode("/", $_SERVER['REQUEST_URI']);

$controller = "index";
if($url_array[2] != "") {
	$controller = $url_array[2];
}


$action = 'action_';
if(isset($url_array[3]) && $url_array[3] != ""){
    $action .= $url_array[3];
}else{
    $action .= 'index';
}

switch($controller){
    case 'index':
        $contr = new C_Page();
        break;
    case 'user':
        $contr = new C_User();
        break;
    case 'manager':
        $contr = new C_Manager();
        break;
    case 'cart':
        $contr = new C_Cart();
        break;
   default:
        $contr = new C_Page();
}

$contr->Request($action);


