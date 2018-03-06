<?php
/**
 * Класс для работы с пользователем.
 */
class UserM
{
    protected $user_id, 
              $user_login, 
              $user_name, 
              $user_password;
    
    public function __construct(){}
    
    /**
     * Конкатенация хэшей пароля и имени и переворачивания наоборот с помощью strrev()
     * 
     * @Warning: <b>Нельзя менять логику этого метода! Иначе никто из зарегестрированных пользователей не сможет зайти в систему!</b>
     * @param string $login Логин пользователя.
     * @param string $password Пароль.
     * @return string Возвращает хэшированый логин+имя и перевернутый.
     */
    public function setPass($login, $password) {
	   return strrev(md5($login) . md5($password));
    }
    
    /**
     * Возвращает массив с данными о пользователе.
     * 
     * @param number $id
     * @return array|mixed
     */
    public function getUser($id)
    {
        $res = PdoM::Instance() -> Select(USERS, USER_ID, $id);
// var_dump($res);
        return $res;
    }
    
    /**
     * Метод регистрации пользователя.
     * 
     * @param string $name Имя пользователя
     * @param string $login Никнейм пользователя
     * @param string $password Мудреный хешированый конкатенированный с именем и реверсивный пароль из за $this->setPass($name, $password)
     * @return boolean
     */
    public function regUser($name, $login, $password) 
    {
        $res = PdoM::Instance() -> Select(USERS, USER_LOGIN, $login);
        if (!$res) {
            $password = $this -> setPass($login, $password);
            $object = [
              'name' => $name,
              'login' => $login,
              'password' => $password
            ];
            $res = PdoM::Instance() -> Insert(USERS, $object);
            if (is_numeric($res)) { // Если вставка совершилась то вернется id то есть номер строки в таблице.
                return "regUser(): Регистрация прошла успешно.";
                
            } else {
                return "regUser(): Регистрация прервалась ошибкой.";
            }
        } else { // Если вставка не совершилась то вернется массив c той строкой которая уже зарегистрирована.
            return "regUser(): Пользователь уже существует.";
        }
    }
    
    /**
     * Метод класса модели который обрабатывает вход пользователя.
     * 
     * @param string $login
     * @param string $password
     * @return string
     */
    public function login($login, $password) 
    {
        // Достаем информацию о пользователе:
        $res_login = PdoM::Instance()->Select(USERS, USER_LOGIN, $login);
        // Достаем информацию о корзине пользователе:
        $query = "SELECT * FROM `".BASKETS."` RIGHT JOIN `".ITEMS."` ON `".BASKETS."`.`item_id` = `ITEMS`.`item_id`";
        $basket_db = PdoM::Instance()->SelectOnQuery($query, true);
//        $basket_db = PdoM::Instance()->Select(BASKETS, USER_ID, $res_login[USER_ID], true);
        foreach ($basket_db as $basket_array) {
            $basket_object[$basket_array['basket_id']] = [
                'item_id'   => $basket_array['item_id'],
                'item_name' => $basket_array['name'],
                'count'     => $basket_array['count'],
                'option_id' => $basket_array['option_id']
            ];
//print_r($basket_array['option_id']);
        }
echo '<pre>$basket_object:';
var_dump($basket_db);
echo '</pre>';

        // Если логин в бд существует:
        if ($res_login) {
            // Сверяем пароль:
            if ($res_login[USER_PASSWORD] == $this->setPass($login, $password)) {
                // В сессию передается id пользователя.
                $_SESSION[USER_ID] = $res_login[USER_ID]; 
                // В сессию передается basket пользователя.
                $_SESSION['basket'] = $basket_object;
                if ($res_login[USER_IS_ADMIN] == 1) // Если залогинился администратор.
                {   // В сессию передается то, что он админ.
                    $_SESSION[USER_IS_ADMIN] = $res_login[USER_IS_ADMIN]; 
                     return 'Добро пожаловать в систему администратор, ' . $res_login[USER_NAME] . '!';
//                    return header("Location: " . $_SERVER['HTTP_REFERER']);
                } else {
                     return 'Добро пожаловать в систему, ' . $res_login[USER_NAME] . '!';
//                    return header("Location: " . $_SERVER['HTTP_REFERER']);
                }
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }  
    }
    
    /**
     * Метод выхода из системы.
     * 
     * @return boolean
     */
    public function logout()
    {
    	if (isset($_SESSION["user_id"])) {
    	    unset($_SESSION["user_id"]);
    	    session_destroy();
    	    return header("Location: " . $_SERVER['HTTP_REFERER']);
    	} else {
    	    return false;
    	}                      
    }
}