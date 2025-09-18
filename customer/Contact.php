<?php
include("../modal/Homemodal.php");
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
    function __construct($page) {}
}
