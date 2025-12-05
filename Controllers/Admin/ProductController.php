<?php
require_once "Models/Product.php";
class ProductController
{
    private $connection;
    private $productModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->productModel = new Product($this->connection);
    }

    public function index()
    {
        $productList = $this->productModel->getAllProducts(1, 10);
        require_once "admin/product.php";
    }

    public function create() {}
    public function store() {}
    public function edit() {}
    public function update() {}
    public function delete() {}
}
