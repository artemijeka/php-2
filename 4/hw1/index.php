<?php
require_once 'vendor/autoload.php';

// Коннект к базе данных
require_once 'models/db_connect.php';

$connect = new ConnectToDB();
$data = $connect -> getRows(15);

if (!isset($_GET['page'])) {
    $page = 2;
}
else {
    $page = ++$_GET['page'];
}

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader);
$template = $twig -> loadTemplate('catalog.tmpl');

echo $template -> render( array(
  'data' => $data,
  'page' => $page
));