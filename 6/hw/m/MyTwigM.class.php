<?php
/**
 * Модель-класс для работы с twig.
 * 
 * @author Артем Кузнецов
 */
class MyTwigM
{
    /**
     * Метод выводит заданный шаблон с заданными переменными в массиве.
     * 
     * @param string $templateName имя шаблона в 'v/'
     * @param array $vars массив переменных которые выводятся в шаболоне.
     * @return вывод шаблона на экран.
     */
    public static function myTwigTemplate($templateName, $vars = [])
    {
        try {
            $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
            $twig = new Twig_Environment($loader); // Регистрируем твиг.
            $template = $twig -> loadTemplate($templateName); // Указываем шаблон.
            echo $template -> render($vars);
        } catch (Exception $e) {
            die ('ОШИБКА: ' . $e -> getMessage());
        }
     }
    
}