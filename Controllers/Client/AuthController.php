<?php

class AuthController
{

    private $userModel;

    public function __construct($connection)
    {
        require_once "Models/User.php";
        $this->userModel = new User($connection);
    }
    public function login()
    {
        if (isset($_SESSION['user'])) {
            header("Location: ?view=home");
            return;
        }

        require_once "Views/login.php";
    }
    public function handleLogin() {
        $mail = $_POST['email'];
        $password = $_POST['password'];

        $user = $this->UserModel->getOneUser($mail);

        if(empty($user) || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Email hoặc mật khẩu không đúng";
            header("Location: ?view=login");
            return;
        }
        else {
            // Lưu thông tin người dùng vào session
            $_SESSION['user'] = $user;
            // Chuyển hướng đến trang chủ hoặc trang mong muốn
            header("Location: ?");
            return;
        }
    }
}