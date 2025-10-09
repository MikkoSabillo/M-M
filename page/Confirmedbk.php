
<?php
include("../model/Adminmodal.php");
$page['page'] = 'Confirmed';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'confirmed';

session_start();

if (isset($_SESSION['admin'])) {
    if (isset($_GET['function'])) {
        new ActiveConfirmed($page);
    } else {
        new Confirmed($page);
    }
} else {
    header('Location: Homepage.php');
}

class Confirmed
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

    function confirmed()
    {
        $adminusertable = new Adminmodal;

        

        include '../views/Confirmed.php';
    }
}

class ActiveConfirmed
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

    function completed()
    {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $booking_id     = $_POST['booking_id'] ?? null;
            $payment_method = $_POST['payment_method'] ?? null;
            $date = $_POST['payment_date'] ?? null;
            $amount = $_POST['amount'] ?? null;

            $adminusertable = new Adminmodal();
            $success = $adminusertable->Paymetbk($booking_id, $amount, $date, $payment_method);
             
            if ($success) {
                echo "<script>alert('✅ Payment successful, booking approved!');</script>";
                header('Location: ../page/Confirmedbk.php');
            } else {
                echo "<script>alert('❌ Payment failed!');</script>";
            }
        }

         $usertable1 = $adminusertable->ActiveConfirmed();
        include '../views/Confirmed.php';
    }
}
?>
