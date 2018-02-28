<?php

class MANAGER extends SQL{

	function __construct(){

	}
	public function manShowAllProd(){
		return SQL::Instance()->Select("SELECT * FROM products_table");
	}
}

