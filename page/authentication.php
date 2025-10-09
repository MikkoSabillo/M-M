<?php 
include '../model/Authemodal.php';

$function = $_GET['function'];

$authenticatipon = new authentication;

$authenticatipon->{$function}();

class authentication{
     function login(){

        $Authemodal = new Authemodal();

		 	$Email = $Authemodal->getEmail($_POST['Email']);
			
		 	$pass = 0;
		 	foreach ($Email as $password){
		 		if (password_verify($_POST['pass'], $password['password'])){
					
		 			header('location: ../page/admin.php');
		 			$pass = 1;
		 		}
		 	}
		 	//check for if pass value changed to 1, meaning username or password been found
		 	if ($pass == 0){
		 		echo "<script>alert('Invalid Username of Password!');</script>";
		 		/*echo "<script>window.history.back(-1);</script>";*/
		 	}
			
			include "../views/login.php"; //get the views
     }
}
?>