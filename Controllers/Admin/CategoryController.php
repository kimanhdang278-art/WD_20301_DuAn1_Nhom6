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

    public function create()
    {
        require_once "admin/modules/category-module/add.php";
    }
    public function store()
    {
        $data = [
            'name' => $_POST['name'],

        ];

        $this->categoryModel->createCategory($data);
        header("Location:?role=admin&module=category&action=index");
        exit();
    }
    public function edit()
    {
        if (!isset($_GET['id'])) {
            header("Location:?role=admin&module=category&action=index");
            exit();
        }

        $id = (int)$_GET['id'];
        $category = $this->categoryModel->getOneCategory($id);

        if (!$category) {
            header("Location:?role=admin&module=category&action=index");
            exit();
        }

        require_once "admin/modules/category-module/edit.php";
    }

    public function update()
    {
        if (!isset($_POST['id'], $_POST['name'])) {
            die('Thiếu dữ liệu ID hoặc Name');
        }

        $data = [
            'id'   => (int)$_POST['id'],
            'name' => trim($_POST['name']),
        ];

        $this->categoryModel->updateCategory($data);

        header("Location:?role=admin&module=category&action=index");
        exit();
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            header("Location:?role=admin&module=category&action=index");
            exit();
        }

        $id = (int)$_GET['id'];

        
        $category = $this->categoryModel->getOneCategory($id);
        if (!$category) {
            header("Location:?role=admin&module=category&action=index");
            exit();
        }

        $this->categoryModel->deleteCategory($id);

        header("Location:?role=admin&module=category&action=index");
        exit();
    }
}
