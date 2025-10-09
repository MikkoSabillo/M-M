<?php
include("../model/Homemodal.php");
include("sessionGuard.php");
requireRole('customer');
$page['page'] = 'Service';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';



// ✅ If already logged in → go normal flow

    if (isset($_GET['function'])) {
        new ActiveService($page);
    } else {
        new Service($page);
    }

class Service
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

    function Home()
    {
        $Homemodal = new Homemodal;
        $msg = '';
        $srv = $Homemodal->Service();

        include('../views/Service.php');
    }
}

class ActiveService
{
    private $page = '';
    private $subpage = '';
    protected $Homemodal = '';
    function __construct($page)
    {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];

        $this->{$_GET['function']}();
    }

    function BOOKNOW()
    {
        $Homemodal = new Homemodal;
        $msg = '';
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['book'])) {
            $user_id     = $_SESSION['customer']['user_id'];
            $vehicle_id  = $_POST['vehicle_id'];   // ✅ Now defined
            $service_id  = $_POST['packagetype'];
            $washdate    = $_POST['washdate'] ?? null;
            $washtime    = $_POST['washtime'] ?? null;
            $washingpoint = $_POST['washingpoint'] ?? null;
            $message     = $_POST['message'] ?? null;

            $result = $Homemodal->booknow(
                $user_id,
                $vehicle_id,
                $service_id,
                $washdate,
                $washtime,
                $washingpoint,
                $message
            );
            echo "<script>alert('$result'); window.location.href='Service.php';</script>";
            
        }

        $srv = $Homemodal->Service();
        include('../views/Service.php');
    }
}
?>