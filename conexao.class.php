<?php

class conexao{
	static public $dns;
	static public $usr;
	static public $psw;
	static public $sok;
	static public $pdo;


	static function conn(){
		if(is_null(self::$pdo)){
			self::$dns = "mysql:host=localhost;dbname=socket";
			self::$usr = "root";
			self::$psw = "root";
			self::$pdo = new PDO(self::$dns, self::$usr, self::$psw);
		}
		
		return self::$pdo;
	
	}


}

?>
