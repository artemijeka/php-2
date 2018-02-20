<?php
/**
 * Точка входа.
 * @author Артем Кузнецов
 */
require_once 'autoload.php';

$method = (isset($_GET['method'])) ? $_GET['method'] : 'index'; // Допустим 'read' или 'edit'.

if (isset($_GET['class'])) {
    if ($_GET['class'] === 'page') {
        $controller = new PageC();
    } elseif ($_GET['class'] === 'user') {
        $controller = new UserC();
    }
} else {
    $controller = new PageC();
}

$controller -> request($method);