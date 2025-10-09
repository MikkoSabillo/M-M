<?php
include("../model/Homemodal.php");
include("sessionGuard.php");
requireRole('customer');

$page['page'] = 'Profilepage';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'profile';



// ✅ If already logged in → go normal flow

if (isset($_GET['function'])) {
    new ActiveProfilepage($page);
} else {
    new Profilepage($page);
}

class Profilepage
{

    private $page = '';

    private $subpage = '';

    protected $Homemodal = '';


    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];



        $this->{$page['subpage']}();
    }

    function profile()
    {
        $Homemodal = new Homemodal;
        $msg = '';

        $usertable = $Homemodal->users_table($_SESSION['customer']['user_id']);



        include('../views/Profile.php');
    }
}

class ActiveProfilepage
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

    function profile()
    {
        $Homemodal = new Homemodal;
        $msg = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $id = $_POST['id'] ?? '';
            $first_name = $_POST['first_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';
            $nickname = $_POST['nickname'] ?? '';
            $gender = $_POST['gender'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $email = $_POST['email'] ?? '';
            $preferred_contact = $_POST['preferred_contact'] ?? '';
            $address = $_POST['address'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            $zip_code = $_POST['zip_code'] ?? '';

            // Handle profile picture upload
            $profile_pic = '';
            if (!empty($_FILES['profile_pic']['name'])) {
                $target_dir = "../images/";
                $filename = basename($_FILES["profile_pic"]["name"]);
                $profile_pic = $target_dir . $filename;

                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $profile_pic)) {
                    $upadte = $Homemodal->userupd(
                        $username,
                        $id,
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
                } else {
                    echo "Error uploading file.";
                }
            }




            $upadte = $Homemodal->userupd(
                $username,
                $id,
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

            if ($upadte) {
                echo "<script>alert('✅ Upadate successful!'); window.location.href='profilepage.php';</script>";
                exit;
            } else {
                echo "<script>alert('❌ Upadate failed'); window.location.href='profilepage.php';</script>";
            }
        }
        include('../views/Profile.php');
    }

    function concel()
    {
        $Homemodal = new Homemodal;
        $msg = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'];
            $id = $_POST['id'];

            $concel = $Homemodal->concelbk($status, $id);
            if ($concel) {
                echo "<script>alert('✅ Upadate successful!'); window.location.href='profilepage.php';</script>";
            } else {
                echo "<script>alert('❌ Upadate failed'); window.location.href='profilepage.php';</script>";
            }
        }


        include('../views/Profile.php');
    }

    function deleteconcelbk()
    {
        $Homemodal = new Homemodal;
        $deletemsg = $Homemodal->deleteconcelbk($_GET['delete_id']);

        if ($deletemsg) {
            echo "<script>alert('Deleting was failed'); window.location.href='profilepage.php';</script>";
        } else {
            echo "<script>alert('Deleting was successful!'); window.location.href='profilepage.php';</script>";
        }
        include('../views/Profile.php');
    }

    function addvh()
    {
        $Homemodal = new Homemodal;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $make = $_POST['Make'];
            $model = $_POST['Model'];
            $year = $_POST['year'];
            $licenseplate = $_POST['licenseplate'];
            $id = $_POST['id'];

            $concel = $Homemodal->addvhk($id, $make, $model, $year, $licenseplate );
            
            if ($concel) {
                echo "<script>alert('Adding new Vehicle was successful!'); window.location.href='profilepage.php';</script>";
            } else {
                echo "<script>alert('failed!! Please try Again'); window.location.href='profilepage.php';</script>";
            }
        }

        

        include('../views/Profile.php');
    }
}
