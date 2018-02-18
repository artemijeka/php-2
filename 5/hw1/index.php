<?php
/**
 * Точка входа.
 * @author Артем Кузнецов
 */

include_once 'autoload.php';

//$method = 'method';
$method = (isset($_GET['m'])) ? $_GET['m'] : 'index'; // Допустим 'read' или 'edit'.

if (isset($_GET['c'])) {
    if ($_GET['c'] === 'page') {
        $controller = new PageC();
    } elseif ($_GET['c'] === 'user') {
        $controller = new UserC();
    }
} else {
    $controller = new PageC();
}

$controller -> request($method);
