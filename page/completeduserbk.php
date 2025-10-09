
<?php
include ("../model/Adminmodal.php");
$page['page'] = 'Completed';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'completed';

session_start();

if (isset($_SESSION['admin'])) {
    if (isset($_GET['function'])) {
        new ActiveCompleted($page);
    } else {
        new Completed($page);
    }
} else {
    header('Location: Homepage.php');
}

class Completed
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

    function completed()
    {
        $adminusertable = new Adminmodal;
		 
       
		include '../views/completedbk.php';
    }
}
class ActiveCompleted{
	private $page = '';

    private $subpage = '';
}
?>