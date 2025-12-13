<?php
class ProductController
{
    private $connection;
    private $productModel;
    private $categoryModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->productModel = new Product($this->connection);
        $this->categoryModel = new Category($this->connection);
    }

    public function index()
    {
        $productList = $this->productModel->getAllProducts(1, 10);
        require_once "admin/product.php";
    }

    public function create()
    {
        $categoriesResult = $this->categoryModel->getAllCategory(1, 100);
        $categories = $categoriesResult['data'] ?? [];
        require_once "admin/modules/product/add.php";
    }
    public function store()
    {
        $data = [
            'category_id'      => $_POST['category_id'],
            'name'              => $_POST['name'],
            'price'             => $_POST['price'],
            'stock'             => $_POST['stock'],
            'description'       => $_POST['description'],
            'organic_certified' => $_POST['organic_certified'],
            'is_active'         => $_POST['is_active'],
        ];
        $image = $_FILES['image'] ?? null;
        if ($image && $image['error'] == 0) {
            $filename = time() . "_" . basename($image['name']);
            $uploadsDir = dirname(__DIR__, 2) . '/uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }
            $targetPath = $uploadsDir . $filename;

            move_uploaded_file($image['tmp_name'], $targetPath);
            $data['image'] = $filename;
        } else {
            $data['image'] = null;
        }
        $this->productModel->createProduct($data);
        header("Location:?role=admin&module=products&action=index");
        exit();
    }
    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->productModel->getOneProduct($id, null);
        require_once "admin/modules/product/edit.php";
    }
    public function update()
    {
        $data = [
            'category_id'      => $_POST['category_id'],
            'name'              => $_POST['name'],
            'price'             => $_POST['price'],
            'stock'             => $_POST['stock'],
            'description'       => $_POST['description'],
            'image'             => null,
            'organic_certified' => $_POST['organic_certified'],
            'is_active'         => $_POST['is_active'],
        ];
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        if ($id === null) {
            header("Location:?role=admin&module=products&action=index");
            exit();
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $image = $_FILES['image'];
            $filename = time() . "_" . basename($image['name']);
            $uploadsDir = dirname(__DIR__, 2) . '/uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }
            $targetPath = $uploadsDir . $filename;
            move_uploaded_file($image['tmp_name'], $targetPath);
            $data['image'] = $filename;
        } else {
            $existing = $this->productModel->getOneProduct($id, null);
            $data['image'] = $existing['image'] ?? null;
        }

        $data['id'] = $id;
        $this->productModel->updateProduct($data);
        header("Location:?role=admin&module=products&action=index");
        exit();
    }
    public function delete()
    {
        $id = $_GET['id'];
        $product = $this->productModel->deleteProduct($id);
        header("Location: ?role=admin&module=products&action=index");
        exit();
    }
}
