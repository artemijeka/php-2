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
$ledi->addATitleToTheDog("Гранд чемпион.");
$ledi->addATitleToTheDog("Чемпион России.");
// Вывод имени и титулов собаки на экран
echo "Титулы собаки ".$ledi->getInfoAboutThisDog('nickname').": ".$ledi->getInfoAboutThisDog('titles'); 

echo "<br>";

// Регистрируем новый помет
$ledi->newLitter("30.01.2018", "2", "3"); 

// Продали одного кобеля и одну суку:
$ledi->soldMale(1);
$ledi->soldFemale(1);

// Выводим объявление о помете
echo "Ведется запись на щенков от собаки: ".$ledi->getInfoAboutThisDog('nickname').". "."Дата рождения щенков: ". $ledi->getInfoAboutThisDog('litter_date')." года. ";
// Вывидим кол-во щенков
echo "В наличии: кобелей ".$ledi->getInfoAboutThisDog('number_of_males').", сук ".$ledi->getInfoAboutThisDog('number_of_females').".";

// --- Регистрируем нового щенка: ---
$sharik = new Puppy($ledi->getInfoAboutThisDog('litter_date'), 
                    'male', 
                    $ledi->getInfoAboutThisDog('coloring'), 
                    'Шарик', 
                    $ledi->getInfoAboutThisDog('prefix'), 
                    23456);
// Добавляем титулы
$sharik->addATitleToTheDog('Лучший любитель нагадить где не надо в классе юниор!');
echo "<br>";
echo "Окрас ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('coloring');
echo "<br>";
echo "Имя у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('nickname');
echo "<br>";
echo "Приставка у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('prefix');
echo "<br>";
echo "Тату у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('stamp');
echo "<br>";
echo "Титулы у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('titles');
echo "<br>";
echo "Дата помета у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('litter_date');
echo "<br>";
echo "Число кобелей у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('number_of_males');
echo "<br>";
echo "Число сук у ".$sharik->getInfoAboutThisDog('nickname').": ".$sharik->getInfoAboutThisDog('number_of_females');
