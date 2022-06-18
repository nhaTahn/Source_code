<?php
require_once('/xampp/htdocs/Source_code/controllers/admin/base_controller.php');
require_once('/xampp/htdocs/Source_code/models/admin.php');

class AdminController extends BaseController
{
    function __construct()
    {
        $this->folder = 'admin';
    }

    public function index()
    {
        $admin = Admin::getAll();
        $data = array('admin' => $admin);
        $this->render('index', $data);
    }

    public function add()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $add_new = Admin::insert($username, $password);
        header('Location: index.php?page=admin&controller=admin&action=index');
    }

    public function edit()
    {
        $username = $_POST['new-email'];
        $newPassword = $_POST['new-password'];
        $change_pass = Admin::changePassword_($username, $newPassword);
        //header('Location: index.php?page=admin&controller=admin&action=index');
        header('Location: index.php?page=admin&controller=members&action=index');

    }

    public function delete()
    {
        $username = $_POST['email'];
        $x = Admin::delete($username);
        header('Location: index.php?page=admin&controller=members&action=index');
    }

    
}
