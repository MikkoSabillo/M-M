<?php
include("../modal/Homemodal.php");


$page['page'] = 'Profilepage';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'profile';

session_start();

// ✅ If already logged in → go normal flow
if (isset($_SESSION['customer']) || isset($_SESSION['admin']) || isset($_SESSION['customer1'])) {
    if (isset($_GET['function'])) {
        new ActiveProfilepage($page);
    } else {
        new Profilepage($page);
    }
} else {
    header('Location: Homepage.php');
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
    function __construct($page) {}
}
