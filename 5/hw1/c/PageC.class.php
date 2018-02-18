<?php
/**
 * @Author: Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 * @Method: read()
 */
class PageC extends BaseC
{
    /**
     * @Description: Метод считывает файл data/text.txt и задает контент с этим текстом.
     */
    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = TextM::textGet(); // Считываем файл и переносим на новые строки каждое предложение.
//        $this -> content = $this -> Template('v/index.twig', array('text' => $text)); // В свойство content кладем шаблон index.twig
        
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('read.twig');
        $vars = array(
            'text' => $text
        );
        echo $template -> render($vars);
        
//        $this -> content = $this -> Template('v/edit.twig', array('text' => $text)); // В свойство content кладем шаблон edit.twig с текстом из data/text.txt
       
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('edit.twig');
        $vars = array(
//            'title' => $this->title,
//            'content' => $this->content, 
            'text' => $text
        );
        echo $template -> render($vars);
    }
    
    /**
     * @Description: Метод для редактирования текста.
     * @Public
     */
    public function edit()
    {
        $this -> title .= ' | Редактирование';
        
        if ($this -> isPost()) { // Проверяет используется ли метод POST в c/Controller.class.php
            TextM::textSet($_POST['text']);
            header('location: index.php'); // Передает http заголовок. То есть для перехода на index.php
            exit(); // Прекращает выполнение скрипта. Функции отключения и деструкторы объекта будут запущены, даже если была вызвана конструкция exit.
        }
        
        $text = TextM::textGet();
//        $this -> content = $this -> Template('v/edit.twig', array('text' => $text)); // В свойство content кладем шаблон edit.twig с текстом из data/text.txt
       
        $loader = new Twig_Loader_Filesystem('v'); // Указываем папку с шаблонами для твиг.
        $twig = new Twig_Environment($loader); // Регистрируем твиг.
        $template = $twig -> loadTemplate('edit.twig');
        $vars = array(
//            'title' => $this->title,
//            'content' => $this->content, 
            'text' => $text
        );
        echo $template -> render($vars);
    }
}
