<?php

require_once './lib/DogMother.class.php';
require_once './lib/Puppy.class.php';

// --- Регистрация новой собаки: ---
// Инициализация переменных
$birth_day = "1.1.2008";
$sex = "female";
$coloring = "п/с";
$nickname = "Хорошенькая Леди Звезда";
$prefix = "Монинг Стар";
$stamp = 1234;
// Создание объекта
$ledi = new DogMother($birth_day, $sex, $coloring, $nickname, $prefix, $stamp);

// Добавление пары титулов
$ledi->AddATitleToTheDog("Гранд чемпион.");
$ledi->AddATitleToTheDog("Чемпион России.");
// Вывод имени и титулов собаки на экран
echo "Титулы собаки ".$ledi->GetInfoAboutThisDog('nickname').": ".$ledi->GetInfoAboutThisDog('titles'); 

echo "<br>";

// Регистрируем новый помет
$ledi->NewLitter("30.01.2018", "2", "3"); 

// Продали одного кобеля и одну суку:
$ledi->SoldMale(1);
$ledi->SoldFemale(1);

// Выводим объявление о помете
echo "Ведется запись на щенков от собаки: ".$ledi->GetInfoAboutThisDog('nickname').". "."Дата рождения щенков: ". $ledi->GetInfoAboutThisDog('litter_date')." года. ";
// Вывидим кол-во щенков
echo "В наличии: кобелей ".$ledi->GetInfoAboutThisDog('number_of_males').", сук ".$ledi->GetInfoAboutThisDog('number_of_females').".";

// --- Регистрируем нового щенка: ---
$sharik = new Puppy($ledi->GetInfoAboutThisDog('litter_date'), 
                    'male', 
                    $ledi->GetInfoAboutThisDog('coloring'), 
                    'Шарик', 
                    $ledi->GetInfoAboutThisDog('prefix'), 
                    23456);
// Добавляем титулы
$sharik->AddATitleToTheDog('Лучший любитель нагадить где не надо в классе юниор!');
echo "<br>";
echo "Окрас ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('coloring');
echo "<br>";
echo "Имя у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('nickname');
echo "<br>";
echo "Приставка у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('prefix');
echo "<br>";
echo "Тату у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('stamp');
echo "<br>";
echo "Титулы у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('titles');
echo "<br>";
echo "Дата помета у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('litter_date');
echo "<br>";
echo "Число кобелей у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('number_of_males');
echo "<br>";
echo "Число сук у ".$sharik->GetInfoAboutThisDog('nickname').": ".$sharik->GetInfoAboutThisDog('number_of_females');
