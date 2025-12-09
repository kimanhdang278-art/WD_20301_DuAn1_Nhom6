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

    public function create()
    {
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
           $image = $_FILES['image'];
           if($image['error'] == 0){
            $filename = time() ."_" .basename($image['name']);
            $targetPath = "uploads/" .$filename;

            move_uploaded_file($image['tmp_name'], $targetPath);
            $data['image'] = $filename;
           }else{
            $data['image'] = null;
           }
        $this->productModel->createProduct($data);
         header("Location:?role=admin&module=products&action=index");
         exit();
    }
    public function edit()
    {
        $id = $_GET['id'];
        $product = $this->productModel->getOneProduct($id);
        require_once "admin/modules/product/edit.php";
        header("Location:?role=admin&module=products&action=index");
         exit();
    }
    public function update()
    {
        $data = [
            'category_id'      => $_POST['category_id'],
            'name'              => $_POST['name'],
            'price'             => $_POST['price'],
            'stock'             => $_POST['stock'],
            'description'       => $_POST['description'],
            'image'             => $_POST['image'],
            'organic_certified' => $_POST['organic_certified'],
            'is_active'         => $_POST['is_active'],
        ];
        $this->productModel->updateProduct($data);
     
    }
    public function delete() {
        $id = $_GET['id'];
        $product = $this->productModel->deleteProduct($id);
        header("Location: ?role=admin&module=products&action=index");
         exit();
      
    }
}
