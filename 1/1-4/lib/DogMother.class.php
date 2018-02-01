<?php

class DogMother
{   
    // --- Состояние объекта: ---
    private $birth_day;                   // День рождения
    private $sex;                         // Пол
    private $coloring;                    // Окрас собаки
    private $nickname;                    // Кличка
    private $prefix;                      // Заводская приставка
    private $stamp;                       // Номер клейма    
    // Наживное
    private $titles;                      // Титулы и награды собаки
    // Текущий помет
    private $litter_date;                 // День крайнего помета
    private $number_of_males;             // Кол-во самцов в помете
    private $number_of_females;           // Кол-во самок в помете
    // Кол-во щенков проданных и оставшихся
    private $nubmer_of_sold_males;        // Кол-во проданных самцов
    private $number_of_remaining_males;   // Кол-во оставшихся самцов
    private $nubmer_of_sold_females;      // Кол-во проданных самок
    private $number_of_remaining_females; // Кол-во оставшихся самок
    
    // --- Конструктор для объявления собаки: ---
    function __construct($birth_day, $sex, $coloring, $nickname, $prefix, $stamp){
        $this->birth_day = $birth_day;
        $this->sex = $sex;
        $this->coloring = $coloring;
        $this->nickname = $nickname;
        $this->prefix = $prefix;
        $this->stamp = $stamp;
    }
    
    // --- Поведение объекта: ---
    // Добавление титула собаке
    public function AddATitleToTheDog($new_title) 
    { 
        $this->titles.=" ".$new_title;
    }
    
    // Регистрирует новый помет
    public function NewLitter($litter_date, $number_of_males, $number_of_females)
    { 
        $this->litter_date = $litter_date;
        $this->number_of_males = $number_of_males;
        $this->number_of_females = $number_of_females;
    }
    
    // Обновление информации о купленных кобелях и оставшихся
    public function SoldMale($number)
    {
        if ($this->number_of_males<$number){echo "<b style='font-size:1.2em'>У вас нет столько кобелей на продажу! </b>";}
        else {$this->number_of_males -= $number;}
    }
    // Обновление информации о купленных суках и оставшихся
    public function SoldFemale($number)
    {
        if ($this->number_of_females<$number){echo "<b style='font-size:1.2em'>У вас нет столько сук на продажу! </b>";}
        else {$this->number_of_females -= $number;}   
    }
    
    // С ПОМОЩЬЮ КЕЙСОВ И СВИТЧА ПРОИЗВОДИТСЯ ВОЗВРАТ НЕОБХОДИМОЙ ИНФОРМАЦИИ
    public function GetInfoAboutThisDog($case)
    {
        switch ($case)
        {
            case "coloring": // Для возврта окраса
                return $this->coloring;
                break;
            case "nickname": // Для возврта клички
                return $this->nickname;
                break;
            case "prefix": // Для возврта приставки
                return $this->prefix;
                break;
            case "stamp": // Для возврта приставки
                return $this->stamp;
                break;
            case "titles": // Для возврата титулов
                return $this->titles;
                break;
            case "litter_date": // Для возврата даты помета
                return $this->litter_date;
                break;
            case "number_of_males": // Для возврата кол-ва кобелей в помете
                return $this->number_of_males;
                break;
            case "number_of_females": // Для возврата кол-ва сук в помете
                return $this->number_of_females;
                break;            
        }
    }
}