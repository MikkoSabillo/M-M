<?php
include "db_connect.php";

class Authemodal extends Connector
{
	function __construct()
	{
		parent::__construct();
	}

	public function getUserById($id)
	{
		$sql = "SELECT * FROM users_tb WHERE user_id = ?";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute([$id]);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}
}
