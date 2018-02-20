<?php
/**
 * @Description: Класс BaseC наследуется от Controller.
 */
abstract class BaseC extends Controller
{
    protected $title; // Свойство хранящее название страницы.
    protected $content; // Свойство хранящее контент страницы.
    
    public function __construct(){}
    
    /**
     * Метод отдает название и контент страницы.
     * <br/>
     * @var string $title название страницы
     * <br/><br/>
     * @var string $content контент страницы
     */
    public function before()
    {
        $this -> title = 'Название сайта';
        $this -> content = '';
    }
    
    public function render()
    {
        $get_user = new UserM();
        
        if (isset($_SESSION['user_id'])) {
            $user_info = $get_user -> getUser($_SESSION['user_id']);
        } else {
            $user_info['name'] = false;
        }
        
        $vars = array( // Задаем массив переменных которые выводятся в шаболоне.
            'title' => $this -> title,
            'content' => $this -> content, 
            'user' => $user_info['name']
        );
        $this -> myTwigTemplate('main.twig', $vars);
    }
}
