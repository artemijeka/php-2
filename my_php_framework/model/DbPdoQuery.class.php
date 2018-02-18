<?php

// Для теста:
//$table = 'product';
//$object = array(
//  'name'=>'iPhone 5'
//);
//$where = 'id=1';
//$res = SQL_PDO_SINGLETON::Instance()->Update($table,$object,$where);
//echo "<pre>";
//var_dump($res);
//echo "</pre>";
// Конец теста.

/**
 * EXEMPLE PDO SINGLETON SQL DB QUERY CLASS
 * @author Сергей Герасименко <gerasimenkosv@bk.ru>
 * @author правки от Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */    
class DbPdoQuery
{
	private static $instance;
	private $db;
	
	public static function Instance()
        {
		if(self::$instance == null){
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	private function __construct()
        {
		setlocale(LC_ALL, 'ru_RU.UTF8');	
		$this->db = new PDO(DB_DRIVER.':host=' .MYSQL_SERVER . ';dbname='.MYSQL_DB, MYSQL_USER, MYSQL_PASSWORD);
		$this->db->exec('SET NAMES UTF8');
		$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	}
	
	public function Select($query)
        {
		$q = $this->db->prepare($query);
		$q->execute();
		
		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
//                        echo "<pre>";
//                        var_dump($info);
//                        echo "</pre>";
			die($info[2]); // Возвращает текст ошибки.
		}
			
		return $q->fetchAll();					
	}

	public function Insert($table , $object)
        {
		$columns = array();
		
		foreach($object as $key => $value){
			$columns[] = $key;
			$masks[] = "'$value'";
			
			if($value === null){
			    $object[$key] = 'NULL';
			}
		}
		
		$columns_s = implode(',', $columns);
		$masks_s = implode(',', $masks);
		
		$query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
		
		$q = $this->db->prepare($query);
		$q->execute($object);
		
		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
			die($info[2]); // Возвращает текст ошибки.
		}
		
		return $this->db->lastInsertId();		
	}
	
	public function Update($table,$object,$where)
        {
		$sets = array();
		 
		foreach($object as $key => $value){
			
			$sets[] = "$key='$value'";
                                                
			if($value === NULL){
				$object[$key]='NULL';
			}
		 }
		 
		$sets_s = implode(',',$sets);
		$query = "UPDATE $table SET $sets_s WHERE $where";
//echo "<pre>"; // Проверочка.
//var_dump($query); // Проверочка.
// echo "</pre>"; // Проверочка.
		$q = $this->db->prepare($query);
		$q->execute($object);

		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
			die($info[2]); // Возвращает текст ошибки. 
		}
		
		return $q->rowCount();
	}
	
	
	public function Delete($table, $where)
        {
		$query = "DELETE FROM $table WHERE $where";
		$q = $this->db->prepare($query);
		$q->execute();
		
		if($q->errorCode() != PDO::ERR_NONE){
			$info = $q->errorInfo();
			die($info[2]); // Возвращает текст ошибки.
		}
		
		return $q->rowCount();
	}
}
?>