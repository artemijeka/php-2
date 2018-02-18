<?php
/**
 * @Author: Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 * @Method: read()
 */
class PageC extends BaseC
{
    /**
     * @description Метод считывает файл data/text.txt и задает контент с этим текстом.
     */
    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = TextM::textGet(); // Считываем файл.
        $this -> content = $this -> Template('v/index.twig', array('text' => $text)); // В свойство content кладем шаблон index.twig
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
        $this -> content = $this -> Template('v/edit.twig', array('text' => $text)); // В свойство content кладем шаблон edit.twig с текстом из data/text.txt
    }
}
