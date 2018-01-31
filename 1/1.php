<?php

class DogMother
{   
    // Состояние собаки:
    private $stamp;                       // Номер клейма
    private $prefix;                      // Заводская приставка
    private $nickname;                    // Кличка
    private $coloring;                    // Окрас собаки
    private $birth_day;                   // День рождения
    private $titles;                      // Титулы и награды собаки
    // Состояние помета:
    private $litter_date;                 // День крайнего помета
    private $number_of_males;             // Кол-во самцов в помете
    private $number_of_females;           // Кол-во самок в помете
    private $nubmer_of_sold_males;        // Кол-во проданных самцов
    private $number_of_remaining_males;   // Кол-во оставшихся самцов
    private $nubmer_of_sold_females;      // Кол-во проданных самок
    private $number_of_remaining_females; // Кол-во оставшихся самок
    
    // Конструктор для объявления собаки
    function __construct($stamp, $prefix, $nickname, $coloring, $birth_day, $titles){
        $this->stamp = $stamp;
        $this->prefix = $prefix;
        $this->nickname = $nickname;
        $this->coloring = $coloring;
        $this->birth_day = $birth_day;
        $this->titles = $titles;
    }
    
    // Поведение:
//     public function 
    
}