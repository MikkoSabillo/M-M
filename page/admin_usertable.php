<!-- user table -->
<?php
include("../model/Adminmodal.php");
$page['page'] = 'Users';
$page['subpage'] = isset($_GET['subpage']) ? $_GET['subpage'] : 'users_table';

session_start();

if (isset($_SESSION['admin'])) {
    if (isset($_GET['function'])) {
        new ActiveUsers($page);
    } else {
        new Users($page);
    }
} else {
    header('Location: Homepage.php');
}

class Users
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

    function users_table()
    {

        $adminusertable = new Adminmodal;
        // $chat = $message->getMessages();
        $usertable = $adminusertable->users_table();

        $allbk = $adminusertable->allbk();
        include '../views/users.php';
    }
}
class ActiveUsers
{
    private $page = '';

    private $subpage = '';
}
?>