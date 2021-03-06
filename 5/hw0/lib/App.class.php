<?php

class App 
{
    public static function init() 
    {
        /**
         * Подключение к бд через singleton и pdo.
         * Данные для подключения берутся в классе Config
         */
        db::getInstance()->Connect(Config::get('db_user'), Config::get('db_password'), Config::get('db_base'));
        /**
         * Проверяет задан ли path в GET параметре.
         */
        self::web(isset($_GET['path']) ? $_GET['path'] : '');
    }
	
  //http://site.ru/index.php?path=news/edit/5

    protected static function web($url)
    {
        $url = explode("/", $url);
        if (!empty($url[0])) {
            $_GET['page'] = $url[0]; // Часть имени класса контроллера.
            if (!empty($url[1])) {
                if (is_numeric($url[1])) {
                    $_GET['id'] = $url[1];
                } else {
                    $_GET['action'] = $url[1];
                }
                if (!empty($url[2])) {
                    $_GET['id'] = $url[2];
                }
            }
//            var_dump($_GET);
        }
        else {
            $_GET['page'] = 'index';
        }

        if (isset($_GET['page'])) {
            $controllerName = ucfirst($_GET['page']) . 'Controller'; // Exemple IndexController
            $methodName = isset($_GET['action']) ? $_GET['action'] : 'index';
            $controller = new $controllerName();
            
            $data = [
                'content_data' => $controller->$methodName($_GET),
//              'categories' => Category::getCategories(0),
                'title' => $controller->title
            ];
            
            echo '<pre>';
            var_dump($data['content_data']);
            var_dump($data['title']);
            echo '</pre>';
            
            $view = $controller->view . '/' . $methodName . '.html';
            if (!isset($_GET['asAjax'])) {
                $loader = new Twig_Loader_Filesystem(Config::get('path_templates'));
                $twig = new Twig_Environment($loader);
                $template = $twig->loadTemplate($view);
                
                echo $template->render($data);
            } else {
                echo json_encode($data);
            }
        }
    }


}