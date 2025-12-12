<?php
require_once "Models/User.php";

class UserController
{
    private $connection;
    private $userModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->userModel = new User($this->connection);
    }

    public function index()
    {
        $userList = $this->userModel->getAllUser(1, 10);
        require_once "admin/user.php";
    }

}
