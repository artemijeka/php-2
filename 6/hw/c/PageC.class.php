<?php
/**
 * Класс работы со страницей.
 * 
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
class PageC extends BaseC
{
    /**
     * Метод выводит индексную страницу.
     */
    public function index()
    {
        $this -> title .= ' | Главная';
        $this -> is_admin = $_SESSION['is_admin'];
    }
    
    /**
     * Метод каталога
     */
    public function catalog()
    {
        $this -> title .= ' | Каталог';
        $goods = CatalogM::returnGoods(); // !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        $vars = array(
            'goods' => $goods // массив товаров
        );
        MyTwigM::myTwigTemplate('catalog.twig', $vars);
    }
    
    /**
     * Метод считывает файл data/text.txt и задает контент с этим текстом.
     */
    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = TextM::textGet(); // Считываем файл и переносим на новые строки каждое предложение.
        
        $vars = array(
            'text' => $text
        );
        MyTwigM::myTwigTemplate('read.twig', $vars);
    }
    
    /**
     * Метод для редактирования текста.
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
        
        $vars = array(
            'text' => $text
        );
        MyTwigM::myTwigTemplate('edit.twig', $vars);
    }
}
