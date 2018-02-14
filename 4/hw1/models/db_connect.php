<?php
/**
 * Класс устанавливает соединение с бд.
 */

include_once 'config.php';

class ConnectToDB
{
    private $host = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbConnect;
    private $limit = 0;
    
    // Метод создания соединения с бд:
    public function __construct() 
    {
        if (!isset($this->dbConnect)) {
            try {
               $connect = new PDO("mysql:host=".$this->host.";dbname=".$this->dbName, $this->dbUser, $this->dbPass); 
               $connect -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $this -> dbConnect = $connect;
            } catch (PDOException $e) {
                die('Ошибка подключения к БД: '.$e ->getMessage());
            }
        }
    }
    
    public function getRows($numberRows) 
    {
        static $limit;
        if (isset($_GET['page'])) {
            $limit = $numberRows * $_GET['page'];
        }
        else {
            $limit += $numberRows;
        }
        
        $sql = $this->dbConnect->prepare("SELECT brand.name, product.name, product.price FROM product LEFT JOIN brand.name USING (brand_id) LIMIT :limit";
        $sql -> bindParam(':limit', $limit);
        $sql -> execute();
        
        while ($row = $sql -> fetchObject()) {
            $data[] = $row;
        }
        
        return !empty($data)?$data:false;
    }
    
    
}