<?php
include("../model/Homemodal.php");
$page['page'] = 'Service';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'Home';

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

}
?>