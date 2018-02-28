<?php

class showThreeProduct extends SQL{
    public $result;
    
    function __construct(){
        
    }
    
    public function showThree(){
        $this->result = SQL::Instance()->Select('SELECT * FROM products_table LIMIT 3');
        return $this->result;
    }
}

?>