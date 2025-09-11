
<?php
include("../modal/Homemodal.php");
$page['page'] = 'Homepage';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

session_start();

if (!isset($_SESSION['usename'])) {
    if (isset($_GET['function'])) {
        new ActiveHomepage($page);
    } else {
        new Homepage($page);
    }
} else {
    header('Location: Homepage.php');
}

class Homepage 
{

    private $page = '';

    private $subpage = '';



    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];


        $this->{$page['subpage']}();
    }

    function Home()
    {

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

            $hashpass =  password_hash($pass, PASSWORD_DEFAULT);
            // Handle profile picture upload
            $profile_pic = '';
            if (!empty($_FILES['profile_pic']['name'])) {
                $target_dir = "../images/";
                $profile_pic = $target_dir . basename($_FILES["profile_pic"]["name"]);
                move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic);
            }
            $exists = $this->Homemodal->Exists($username);
            if ($exists > 0) {
                echo '<script>alert("⚠️ Username already exists")</script>';
            } else {
                $register = $this->Homemodal->index(
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
                    echo '<script>alert("✅ Registration successful!")</script>';
                } else {
                    echo '<script>alert("❌ Registration failed")</script>';
                }
            }

            include '../views/index.php';
        }
    }

    function login()
    {

        $login = $this->Homemodal->getuser($_POST['username']);

        $pass = 0;

        foreach ($login as $key) {
            if (password_verify($_POST['password'], ($key['password']))) {
                session_start();
                $_SESSION['username'] = $key['username'];
                $_SESSION['user'] = "yess";
                header('Location: Homepage.php');
                $pass = 1;
            }
        }
        if ($pass == 0) {

            echo '<script>alert("Username or Password do not mutch")</script>';
        }

        include '../views/index.php';
    }

}


?>
