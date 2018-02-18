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
    public function setPass ($name, $password) {
	return strrev(md5($name)) . md5($password);
    }
    
    /**
     * Коннект с бд.
     * 
     * @return PDO
     */
    public function connecting () 
    {
	return new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD);  
    }
    
    public function getUser($id)
    {
        $connect = $this -> connecting();
        return $connect -> query("SELECT * FROM users WHERE id = '" . $id . "'")->fetch();
    }
                
    public function login ($login, $password) 
    {
        $connect = $this->connecting();
        $user = $connect->query("SELECT * FROM users WHERE login = '" . $login . "'")->fetch();
        if ($user) {
            if ($user['password'] == $this->pass($user['name'], strip_tags($password))) {
            $_SESSION['user_id'] = $user['id'];
            return 'Добро пожаловать в систему, ' . $user['name'] . '!';
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }  
    }
}