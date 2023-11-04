<?php
namespace Controllers;

include_once "dao/user.php";
use DAO\UserDAO;

class User {
    private $userDAO;

    public function __construct($conn = null) {
        $this->userDAO = new UserDAO($conn);
    }

    public function index() {
        
    }

    public function register() {
        include_once 'views/register.php';
    }

    public function doRegister() {
        $this->userDAO->insert($_POST['username'], $_POST['email'], $_POST['password']);
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
            $this->userDAO->move_uploaded_file($imageData);
        }
        
        header('location:/user/showAll');
    }

    public function login() {
        include_once 'views/login.php';
    }

    public function doLogin() {
        $user = $this->userDAO->login($_POST['username'], $_POST['password']);
        if($user == null) {
            header('location:/user/login');
        }
        else {
            include_once 'views/user.php';
        }
    }

    public function showAll() {
        $users = $this->userDAO->getAll();
        include_once 'views/users.php';
    }


}
?>