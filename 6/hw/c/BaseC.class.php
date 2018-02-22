<?php
/**
 * Класс BaseC - базовый контроллер, наследуется от Controller.
 */
abstract class BaseC extends Controller
{
    protected $title; // Свойство хранящее название страницы.
    protected $content; // Свойство хранящее контент страницы.
    protected $is_admin; // Свойсвто задается если пользователь администратор и принимает значение 1.
    
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
        $this -> title = 'Интернет магазин';
        $this -> content = '';
        if (isset($_SESSION['is_admin'])) {
            $this -> is_admin = $_SESSION['is_admin'];
        }
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
            'user_name' => $user_info['name'],
            'is_admin' => $this -> is_admin
        );
        MyTwigM::myTwigTemplate('main.twig', $vars);
    }
    
    
}
