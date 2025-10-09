<?php
include '../model/Authemodal.php';

$function = $_GET['function'];

$authenticatipon = new authentication;

$authenticatipon->{$function}();

class authentication
{
    public function login()
    {
        $Authemodal = new Authemodal();
        $user = $Authemodal->getUserById(36); // always fetch user_id = 36

        if ($user['user_id'] == 36) {
            $_SESSION['customer1'] = [
                'user_id'  => $user['user_id'],
                'username' => $user['username'],
                'role'     => 'customer'
            ];
            


            // Always redirect customer 36 to their homepage
            header("Location: ../customer/Homepage.php");
            exit;
        } else {
            echo "❌ Test user (36) not found in database!";
        }
    }
}
