<?php
require_once "Models/Order.php";

class OrderController
{
    private $connection;
    private $orderModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->orderModel = new Order($this->connection);
    }

    public function index()
    {
        $orderList = $this->orderModel->getAllOrder(1, 10);
        require_once "admin/order.php";
    }

}
