<?php

class AuthController {
    private $UserModel;
    public function __construct($connection) {
       $this->UserModel = new UserModel($connection);

    }
    public function login() {
        if (isset($_SESSION['user'])) {
            // Nếu đã đăng nhập, chuyển hướng đến trang chủ
            header("Location: ?");
            return;
        }

        require_once "Views/components/login.php";
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
