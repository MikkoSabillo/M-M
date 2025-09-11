<?php
include "db_connect.php";

class Homemodal extends Connector
{
    function __construct()
    {
        parent::__construct();
    }

    function index($username, $hashpass, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code)
    {
        $sql = "INSERT INTO users_tb (username, password, profile_pic, first_name, last_name, nickname, gender, phone, email, preferred_contact, address, city, state, zip_code) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this -> conn->prepare("$sql");

        return $stmt->execute([$username, $hashpass, $profile_pic, $first_name, $last_name, $nickname, $gender, $phone, $email, $preferred_contact, $address, $city, $state, $zip_code]);
    }
    // Check if username exists
    function Exists($username)
    {
        $sql = "SELECT COUNT(*) FROM users_tb WHERE username = ?";
        $query = $this -> conn->prepare($sql);
        $query -> execute([$username]);

        return $query->fetchColumn();
    }

    function getuser($username){
        $sql = "SELECT `username`, `password`, `user_id` FROM `users_tb` WHERE `username` = ? ";

        $query = $this->conn->prepare($sql); //prepare the query
			//bind parameter
			$query->bindParam(1, $username);
			$query->execute(); //run the query
			
			return $query->fetchall(PDO::FETCH_ASSOC); //get all the data and return
    }
}
