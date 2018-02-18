<?php
/**
 * Точка входа.
 * @author Артем Кузнецов
 * 
 * @exemple Пример работы с твигом: 
require_once 'lib/vendor/autoload.php'; // Твиг подгружаем.

$loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
$twig = new Twig_Environment($loader); // Регистрируем твиг.
$template = $twig -> loadTemplate('main.twig'); // Указываем какой шаблон выдать.
$vars = array( // Выводим шаблон с переменными.
    'title' => $this->title,
    'content' => $this->content, 
    'user' => $user_info['name']
);
echo $template -> render($vars);
 */
require_once 'autoload.php';

//echo "<pre>";
//var_dump(UserM::getUser(0));
//echo "</pre>";

//$method = 'method';
$method = (isset($_GET['m'])) ? $_GET['m'] : 'read'; // Допустим 'read' или 'edit'.

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