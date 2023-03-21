<?php
namespace app\core;

class Model{

	public function __construct(){
		$host = 'localhost';
		$dbname = 'my_cliquebait';
		$user = 'root';
		$pass = '';
		try {
			# MySQL with PDO MYSQL
			$this->connection = new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}
		catch(PDOException $e) {
		 echo $e->getMessage();
		}
	}
}