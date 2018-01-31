<?php

class DogMother
{   
    // Состояние объекта:
    private $stamp;                       // Номер клейма
    private $prefix;                      // Заводская приставка
    private $nickname;                    // Кличка
    private $coloring;                    // Окрас собаки
    private $birth_day;                   // День рождения
    private $titles;                      // Титулы и награды собаки
    // Состояние объекта:
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
    
    // Поведение объекта:
    public function NewDateLitter($litter_date) // Регистрирует новый помет
    { 
        $this->litter_date = $litter_date;
    }
    public function CurrentDateLitter() // Возвращает текущую дату помета
    { 
        return $this->litter_date;
    }
    public function Nickname() // Возвращает кличку собаки
    {
        return $this->nickname;
    }
    public function TitlesOfDog(){ // Выводит титулы собаки
        return $this->titles;
    }
}

// Регистрация новой собаки
$stamp = 1234;
$prefix = "Монинг Стар";
$nickname = "Хорошенькая Леди Звезда";
$coloring = "п/с";
$birth_day = "1.1.2008";
$titles = "Супер гранд чемпион всея России!";
$ledi = new DogMother($stamp, $prefix, $nickname, $coloring, $birth_day, $titles);

echo $ledi->TitlesOfDog(); // Вывод титулов собаки

echo "<br>";

$ledi->NewDateLitter('27.02.2018'); // Регистрируем новый помет
// Выводим объявление о ожидании помета
echo "У собаки по кличке ".$ledi->Nickname()." ожидаются щенки ".$ledi->CurrentDateLitter(). " года.";










