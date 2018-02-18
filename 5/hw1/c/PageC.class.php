<?php
/**
 * @author Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
class PageC extends BaseC
{
    /**
     * @description Метод считывает файл data/text.txt и задает контент с этим текстом.
     */
    public function read()
    {
        $this -> title .= ' | Чтение';
        $text = Text::textGet(); // Считываем файл.
        // В свойство content кладем шаблон index.twig:
        $this -> content = $this -> Template('v/index.twig', array('text' => $text));
    }
    
    /**
     * 
     */
    public function edit()
    {
        $this -> title .= ' | Редактирование';
        
        if ($this -> isPost()) { // Проверяет используется ли метод POST в c/Controller.class.php
            
        }
    }
}
