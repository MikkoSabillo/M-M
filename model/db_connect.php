<?php

	class Connector{
	
		//database variables
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		
		protected $conn;
		
		function __construct(){
			try {
				date_default_timezone_set("Asia/Manila");
				$this->conn = new PDO("mysql:host=$this->servername;dbname=carwash", $this->username, $this->password);
				// set the PDO error mode to exception
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//echo "Connected successfully";
			} catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}
	}

?>