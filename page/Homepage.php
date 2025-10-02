<?php
include("../modal/Homemodal.php");
include("sessionGuard.php");

$page['page'] = 'Homepage';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

// ✅ Require customer role

requireRole('customer');

if (isset($_GET['function'])) {
    new ActiveHomepage($page);
} else {
    new Homepage($page);
}


class Homepage
{
    private $page = '';
    private $subpage = '';
    protected $Homemodal = '';

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $Homemodal = new Homemodal();
        $this->{$page['subpage']}();
    }

    function Home()
    {
        $Homemodal = new Homemodal();
          $msg = '';
        $srv = $Homemodal->Service();
        include('../views/index.php');
    }
}

class ActiveHomepage
{
    private $page = '';
    private $subpage = '';
    protected $Homemodal = '';

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];
        $this->Homemodal = new Homemodal();

        $this->{$_GET['function']}();
    }

    function Register()
    {
        $Homemodal = new Homemodal;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $nickname = $_POST['nickname'];
            $gender = $_POST['gender'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $preferred_contact = $_POST['preferred_contact'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip_code = $_POST['zip_code'];

            $hashpass = password_hash($pass, PASSWORD_DEFAULT);

            // Handle profile picture upload
            $profile_pic = '';
            if (!empty($_FILES['profile_pic']['name'])) {
                $target_dir = "../images/";
                $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
            }

            $exists = $Homemodal->Exists($username);
            if ($exists > 0) {
                echo '<script>alert("⚠️ Username already exists")</script>';
            } else {
                $register = $Homemodal->index(
                    $username,
                    $hashpass,
                    $profile_pic,
                    $first_name,
                    $last_name,
                    $nickname,
                    $gender,
                    $phone,
                    $email,
                    $preferred_contact,
                    $address,
                    $city,
                    $state,
                    $zip_code
                );

                if ($register) {
                    echo "<script>alert('✅ Registration successful!'); window.location.href='Homepage.php';</script>";
                    exit;
                } else {
                    echo '<script>alert("❌ Registration failed")</script>';
                }
            }

            $srv = $Homemodal->Service();
            include '../views/index.php';
        }
    }

    function login()
    {
        $homeModel = new Homemodal();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check credentials
            $loginUser = $homeModel->login($username, $password);

            if ($loginUser) {
                session_start();
                // ✅ Special case: user_id = 36 → always customer
                if ($loginUser['user_id'] == 36) {
                    $_SESSION['customer1'] = [
                        'user_id'  => $loginUser['user_id'],
                        'username' => $loginUser['username'],
                        'role'     => 'customer'
                    ];
                    header("Location: ../page/Homepage.php");
                    exit;
                }

                // ✅ Separate sessions by role
                if ($loginUser['role'] == 'admin') {
                    $_SESSION['admin'] = [
                        'user_id'  => $loginUser['user_id'],
                        'username' => $loginUser['username'],
                        'role'     => 'admin'
                    ];
                    header("Location: admin.php");

                } else {
                    $_SESSION['customer'] = [
                        'email'     => $loginUser['email'],
                        'user_id'  => $loginUser['user_id'],
                        'username' => $loginUser['username'],
                        'role'     => 'customer'
                    ];
                    header("Location: Homepage.php");
                }
                exit;
            } else {
                echo "<script>alert('❌ Invalid username or password!'); window.location.href='Homepage.php';</script>";
                exit;
            }
        }
    }
}
