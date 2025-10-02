
<?php
include("../modal/Adminmodal.php");
include("sessionGuard.php");
requireRole('admin');

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

$page['page'] = 'Admin';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'admin';

// ✅ Continue with admin logic

if (isset($_SESSION['admin']) && $_SESSION['admin']['role'] === 'admin') {
    if (isset($_GET['function'])) {
        new ActiveAdmin($page);
    } else {
        new Admin($page);
    }
} else {
    header('Location: Homepage.php');
}

class Admin
{

    private $page = '';

    private $subpage = '';

    protected $adminusertable = '';

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];

        $this->{$page['subpage']}();
    }

    function admin()
    {
        $adminusertable = new Adminmodal;

        $usertable = $adminusertable->users_table();

        $bkpd = $adminusertable->book();
        $allbkr = $adminusertable->allbooking();
        include '../views/dashboard.php';
    }

    function confirmed()
    {
        $adminusertable = new Adminmodal;

        include '../views/Confirmed.php';
    }
    function admin_Service()
    {
        $adminusertable = new Adminmodal;
        $fture = $adminusertable->ftwhite();
        include '../views/admin_Service.php';
    }
    function carousel()
    {
        $adminusertable = new Adminmodal;
        include '../views/Carousel.php';
    }
    function Enquiries(){
        $adminusertable = new Adminmodal;

        include '../views/Enquiries.php';
    }
}
class ActiveAdmin
{
    private $page = '';

    private $subpage = '';

    protected $adminusertable = '';

    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];

        $this->{$_GET['function']}();
    }

    function update_Service()
    {
        $featureModel = new Adminmodal;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $featureId = $_POST['booking_id'];
            $serviceName = $_POST['ServiceN'];
            $featureName = $_POST['featuren'];
            $description = $_POST['Description'];
            $price = $_POST['amount']; // Make sure this is the correct field
            $isIncluded = $_POST['is_included']; // Rename in form if needed
            $paymentDate = $_POST['payment_date'];


            $success = $featureModel->updateFeature($featureId, $serviceName, $featureName, $description, $price, $isIncluded, $paymentDate);

            if ($success) {
                // Redirect or show success toast
                echo "<script>alert('Update Succesfull!!'); window.location.href='admin.php?subpage=admin_Service';</script>";
                exit;
            } else {
                // Handle error
                echo "<script>alert('Update failed. Please try again.'); window.location.href='admin.php?subpage=admin_Service';</script>";
            }
        }
    }


    function updateCarousel()
    {
        $adminusertable = new Adminmodal;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id          = $_POST['useid'] ?? '';
            $title       = $_POST['title'] ?? '';
            $description = $_POST['desc'] ?? '';
            $time        = $_POST['time'] ?? '';
            $profile_pic = $_POST['img'] ?? '';
            

            $crsl = $adminusertable->upCrsl($title, $description, $time, $profile_pic, $id);
            
            if ($crsl) {
                
            } else {
             echo "<script>alert( $crsl ); window.location.href='admin.php?subpage=carousel';</script>";
            }

            include "../views/Carousel.php";
        }
    }
}
?>