<?php
/**
 * @Description: Класс для работы с пользователем.
 * @Method: login($login, $password)
 */
class UserM
{
    protected $user_id, $user_login, $user_name, $user_password;
    
    public function __construct(){}
    
    /**
     * Конкатенация хэшей пароля и имени и переворачивания наоборот с помощью strrev()
     * 
     * @param string $name Имя
     * @param string $password Пароль
     * @return string Возвращает хэшированый и перевернутый пароль+имя
     */
    public function setPass($name, $password) {
	return strrev(md5($name)) . md5($password);
    }
    
    public function getUser($id)
    {
        $query = "SELECT * FROM users WHERE id=" . $id;
//        echo "<pre>";
//        var_dump($query);
//        echo "</pre>";
        $res = PdoM::Instance() -> Select($query);
//        echo "<pre>";
//        var_dump($connect);
//        echo "</pre>";
//        $q = $connect -> prepare($query);
//        $res = $connect -> execute();
        return $res;
    }
    
    /**
     * Метод регистрации пользователя.
     * @param string $name Имя пользователя
     * @param string $login Никнейм пользователя
     * @param string $password Мудреный хешированый конкатенированный с именем и реверсивный пароль из за $this->setPass($name, $password)
     * @return boolean
     */
    public function regUser($name, $login, $password) 
    {
        $query = "SELECT * FROM users WHERE login = '" . $login . "'";
        $res = PdoM::Instance() -> Select($query);
        if (!$res) {
            $query = "INSERT INTO users VALUES (null, '" . $name . "', '" . $login . "', '" . $this->setPass($name, $password) . "'";
            return true;
        } else {
            return false;
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
        $query = "SELECT * FROM users WHERE login='" . $login . "'";
//        var_dump($query);
        $res = PdoM::Instance() -> Select($query);
//        var_dump($res);
//        echo $this -> setPass('admin', 'admin');
        if ($res) {
            if ($res['password'] == $this -> setPass($login, $password)) {
                $_SESSION['user_id'] = $res['id'];
                return 'Добро пожаловать в систему, ' . $res['name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }  
    }
    
    public function logout()
    {
	if (isset($_SESSION["user_id"])) {
	    unset($_SESSION["user_id"]);
	    session_destroy();
	    return true;
	} else {
	    return false;
	}
                      
    }
}