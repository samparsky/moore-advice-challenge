<?php
define("MYSQL_HOST" , "localhost");
define("MYSQL_USERNAME" , "root");
define("MYSQL_PASSWORD" , "samparsky");
define("MYSQL_DATABASE" , "stutern");

class Database {
	
	public static  $instance;

	private function __construct(){}

	public static function getInstance(){
		if(!isset($instance)){
			static $instance;
			$instance = new Database();
		}
		return $instance;
	}

	public function connect(){
		$connection = mysqli_connect(MYSQL_HOST,MYSQL_USERNAME , MYSQL_PASSWORD , MYSQL_DATABASE) or die("Could not connect to the database". mysqli_error());			
		return $connection;
	}

	public function Dbinsert($names , $ages){
		$connection = $this->connect();
		$sql  = 'INSERT INTO user( name , age ) VALUES ( "'.$names.'" , "'.$ages.'" )';
		$result = mysqli_query($connection, $sql);

		return mysqli_error($connection);
	}
}

?>