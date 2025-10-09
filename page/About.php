<?php
include("../model/Homemodal.php");
include("sessionGuard.php");
requireRole('customer');
$page['page'] = 'About';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';



// ✅ If already logged in → go normal flow

if (isset($_GET['function'])) {
    new ActiveAbout($page);
} else {
    new About($page);
}

class About
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

        $about = $Homemodal->getcwabout();

        $brand = $Homemodal->getbrand_tb();
        include('../views/About.php');
    }
}

class ActiveAbout
{
    private $page = '';
    private $subpage = '';
    function __construct($page) {}
}
