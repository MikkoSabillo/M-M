<?php
include("../modal/Homemodal.php");
$page['page'] = 'Contact';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

session_start();

if (!isset($_SESSION['usename'])) {
    if (isset($_GET['function'])) {
        new ActiveContact($page);
    } else {
        new Contact($page);
    }
} else {
    header('Location: Homepage.php');
}
class Contact
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

        include('../views/Contact.php');
    }
}

class ActiveContact
{
    private $page = '';
    private $subpage = '';
    function __construct($page){}
}