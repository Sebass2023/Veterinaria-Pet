<?php 

/**
 * 
 */
class Connection{

	const server = "localhost";
	const dbuser = "root";
	const dbpass = "";
	const dbname = "veterinaria2";
	public $db;

	
	public function __construct(){
			try {
				$this->db = new PDO('mysql:host='.self::server.';dbname='.self::dbname,self::dbuser,self::dbpass);
			} catch (PDOException $e) {
				echo " Error ". $e->getMessage();
			}

		}

}

 ?>