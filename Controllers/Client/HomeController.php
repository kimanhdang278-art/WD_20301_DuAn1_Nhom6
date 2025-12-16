<?php
class HomeController{
    private $productsModel;
    private $categoryModel;
    public function __construct($connection)
    {
        $this->productsModel = new Product($connection);
        $this->categoryModel = new Category($connection);
    }
    public function index(){
        $productsAll = $this->productsModel->getAllProducts(1,8,'', 'desc',null, 1);
        $categoryAll = $this->categoryModel->getAllCategory(1,8,'desc',true);
        require_once "Views/index.php";
    }
}