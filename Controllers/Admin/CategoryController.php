<?php
require_once "Models/Category.php";
class CategoryController
{
    private $connection;
    private $categoryModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->categoryModel = new Category($this->connection);
    }

    public function index()
    {
        $productList = $this->categoryModel->getAllCategory(1, 10);
        require_once "admin/category.php";
    }

    public function create() {}
    public function store() {}
    public function edit() {}
    public function update() {}
    public function delete() {}
}
