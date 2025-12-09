<?php
class HomeController{
    private $productModel;
    private $categoryModel;
    public function __construct($connection)
    {
        $this->productModel = new Product($connection);
        $this->productModel = new Category($connection);
    }
    public function index(){
        require_once "Views/index.php";
    }
}