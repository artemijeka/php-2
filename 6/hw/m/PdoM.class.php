<?php
/**
 * PDO SINGLETON SQL DB QUERY CLASS
 * @author Сергей Герасименко <gerasimenkosv@bk.ru>
 * @author правки от Артем Кузнецов <artem.kuznecov.samara@gmail.com>
 */
class PdoM
{
    private static $instance;
    private $db; // Здесь будет или уже есть соединение с базой данных;
	
    /**
     * Метод создающий единственный экзепляр объекта Singleton
     * @return object PdoM
     */
    public static function Instance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Конструктор производит соединение с бд.
     */
    private function __construct()
    {
    	setlocale(LC_ALL, 'ru_RU.UTF8');	
    	$this -> db = new PDO(DB_DRIVER.':host=' .DB_SERVER . ';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
    	$this -> db -> exec('SET NAMES UTF8');
    	$this -> db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    
    /**
     * 
     * @param string $table
     * @param string $where_key
     * @param any $where_value
     * @param boolean $fetchAll
     * @return array|mixed
     */
    public function Select($table, $where_key = false, $where_value = false, $fetchAll = false) {
        
        if ($where_key AND $where_value) {
            $query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = '" . $where_value . "'";
        } else {
            $query = "SELECT * FROM " . $table;
        }
        
        $query = $this->db->prepare($query);
        $query -> execute();
        
        if ($query -> errorCode() != PDO::ERR_NONE) {
            $info = $query->errorInfo();
            die($info[2]);
        }
        
        if ($fetchAll) {
            return $query -> fetchAll();
        } else if ($where_key AND $where_value) {
            return $query->fetch();
        } else {
            return $query->fetchAll();
        }
    }
//     public function Select($query)
//     {
//     	$q = $this->db->prepare($query);
//     	$q->execute();
    		
//     	if($q->errorCode() != PDO::ERR_NONE){
//                 $info = $q->errorInfo();
//         //      echo "<pre>";
//         //      var_dump($info);
//         //      echo "</pre>";
//                 die($info[2]); // Возвращает текст ошибки.
//         }
    	
//         return $q->fetch();
//     } 
    
    /**
     * Метод вставки в базу данных.
     * @param string $table table name
     * @param assoc array $object Передаваемые значения в базу.
     * @return type
     */
    public function Insert($table , $object)
    {
	$columns = array();
		
	foreach ($object as $key => $value) {
	    $columns[] = $key;
            $masks[] = "'$value'";
            
            if ($value === null) {
                $object[$key] = 'NULL';
            }
	}
		
	$columns_s = implode(',', $columns);
	$masks_s = implode(',', $masks);
		
	$query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";
		
	$q = $this -> db -> prepare($query);
	$q->execute($object);
		
	if ($q -> errorCode() != PDO::ERR_NONE) {
            $info = $q -> errorInfo();
            die($info[2]); // Возвращает текст ошибки.
	}
		
	return $this -> db -> lastInsertId();		
    }
	
    public function Update($table, $object, $where)
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