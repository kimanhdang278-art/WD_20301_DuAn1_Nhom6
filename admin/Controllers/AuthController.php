<?php

class AuthController {

    private $userModel;

    public function __construct($connection) {
        $this->userModel = new User($connection);
    }

    public function login(): void {
        require_once "Views/login.php";
    }
public function handleLogin(): void {
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
    }
}
