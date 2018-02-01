<?

require_once './lib/DogMother.class.php';

// Регистрация новой собаки
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

// Выводим объявление о помете
echo "Ведется запись на щенков от собаки: ".$ledi->GetInfoAboutThisDog('nickname').". Дата рождения щенков: ". $ledi->GetInfoAboutThisDog('litter_date')." года.";
// Вывидим кол-во щенков
echo "В наличии кобели: ".$ledi->GetInfoAboutThisDog('number_of_males')." и суки: ".$ledi->GetInfoAboutThisDog('number_of_females');









