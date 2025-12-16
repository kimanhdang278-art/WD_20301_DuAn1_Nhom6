<?php
class ShopController{
    private $productModel;
    private $categoryModel;
    public function __construct($connection)
    {
        $this->productModel = new Product($connection);
        $this->categoryModel = new Category($connection);
    }
    public function index(){
        $productsAll = $this->productModel->getAllProducts();
        $categoryAll = $this->categoryModel->getAllCategory(1,10);
        require_once "Views/shop.php";
    }
}