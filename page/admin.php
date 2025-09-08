<?php
//require_once '../model/Messages.php';

$function = isset($_GET['function'])? $_GET['function']: 'admin';

$admin = new admin();

	$admin->{$function}();




class admin{
	function admin(){

		// $chat = $message->getMessages();
		
		include '../views/dashboard.php';
	}
// 	function sendMessage(){
// 		//send message
// 		$text = $_POST['message'];
// 		$user_id = $_SESSION['user_id'];
		
// 		$message = new Messages();
		
// 		$chat = $message->addMessage($user_id, $text);
		
// 		echo json_encode($chat);
		
// 	}
 }