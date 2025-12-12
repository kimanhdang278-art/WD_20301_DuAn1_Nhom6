<?php

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
        $categoryList = $this->categoryModel->getAllCategory(1, 10);
        require_once "admin/product-category.php";
    }

    public function create() {
        require_once "admin/modules/category-module/add.php";
    }
    public function store() {
             $data = [
            'name' => $_POST['name'],
        ];
          
        $this->categoryModel->createCategory($data);
         header("Location:?role=admin&module=category&action=index");
         exit();

    }
    public function edit() {
       $id = $_GET['id'];
        $product = $this->categoryModel->getOneCategory($id);
        require_once "admin/modules/category-module/edit.php";
        header("Location:?role=admin&module=category&action=index");
        exit();

    }
    public function update() {
        $data = [
            'name'              => $_POST['name'],
        ];
        $this->categoryModel ->updateCategory($data);
       
    }
    public function delete() {
        $id = $_GET['id'];
        $product = $this->categoryModel->deleteCategory($id);
        header("Location: ?role=admin&module=category&action=index");
         exit();
    }
}