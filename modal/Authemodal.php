<?php
    include "db_connect.php";

    class Authemodal extends Connector{
        function __construct(){
            parent:: __construct();
        }

        function getEmail($Email){
			//getl the carousel featured destination
			$sql = "SELECT `email`, `password` FROM `users_tb` WHERE `email` = ?";
			
			$query = $this->conn->prepare($sql); //prepare the query
			//bind parameter
			$query->bindParam(1, $Email);
			$query->execute(); //run the query
			
			return $query->fetchall(PDO::FETCH_ASSOC); //get all the data and return
			
		}
	}
 

?>