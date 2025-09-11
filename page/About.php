<?php
include("../modal/Homemodal.php");
$page['page'] = 'About';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

session_start();

if (!isset($_SESSION['usename'])) {
    if (isset($_GET['function'])) {
        new ActiveAbout($page);
    } else {
        new About($page);
    }
} else {
    header('Location: Homepage.php');
}
class About
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

        include('../views/About.php');
    }
}

class ActiveAbout
{
    private $page = '';
    private $subpage = '';
    function __construct($page){}
}