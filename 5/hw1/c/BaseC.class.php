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
        
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('main.twig');
        $vars = array(
            'title' => $this->title,
            'content' => $this->content, 
            'user' => $user_info['name']
        );
        echo $template -> render($vars);
    }
}
