<?php
include("../modal/Homemodal.php");
$page['page'] = 'Service';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

session_start();

if (!isset($_SESSION['usename'])) {
    if (isset($_GET['function'])) {
        new ActiveService($page);
    } else {
        new Service($page);
    }
} else {
    header('Location: Homepage.php');
}
class Service
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

        include('../views/Service.php');
    }
}

class ActiveService
{
    private $page = '';
    private $subpage = '';
    function __construct($page){}
}