<?php
/**
 * Точка входа.
 * @author Артем Кузнецов
 */
include_once 'model/Autoload.class.php';

$action = 'action';
$action .= (isset($_GET['action'])) ? $_GET['action'] : 'index';

if (isset($_GET['controller'])) {
    if ($_GET['controller'] === 'page') {
        $controller = new C_Page();
    } elseif ($_GET['controller'] === 'user') {
        $controller = new C_User();
    }
} else {
    $controller = new C_Page();
}