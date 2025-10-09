<?php
include("../model/Homemodal.php");
$page['page'] = 'Contact';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

    if (isset($_GET['function'])) {
        new ActiveContact($page);
    } else {
        new Contact($page);
    }

class Contact
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
        
        include('../views/Contact.php');
    }
}

class ActiveContact
{
    private $page = '';
    private $subpage = '';
    function __construct($page) {
        $this->page = $page['page'];
        $this->subpage = $page['subpage'];

        $this->{$_GET['function']}();
    }
    function contact1(){
        $Homemodal = new Homemodal;

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $message = $_POST['message']?? '';
            $subject = $_POST['subject'] ?? '';
            $usename = $_POST['name'] ?? '';
           $email = $_POST['email'] ?? '';
 
        $success = $Homemodal->inscontact($message, $subject, $usename, $email);
            if($success){
                echo "<script>alert('✅ Sent successful!'); window.location.href='Contact.php';</script>";
        } else{
            echo "<script>alert('Sent failed. Please try again.'); window.location.href='Contact.php';</script>";
        }
    }
        
        include('../views/Contact.php');
    }
}
