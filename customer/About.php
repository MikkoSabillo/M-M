<?php
include("../model/Homemodal.php");
$page['page'] = 'About';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

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
        include('../views/About.php');
    }
}

class ActiveAbout
{
    private $page = '';
    private $subpage = '';
    function __construct($page) {}
}
