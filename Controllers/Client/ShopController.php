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
    
    public function show(){
        $id = isset($_GET['id']) ? (int)($_GET['id']) : 0;
       if ($id <= 0 || !is_numeric($id)) {
           header("Location: index.php?view=shop");
           exit();
        # code...
       }
        $product = $this->productModel->getOneProductById($id);
       if (!$product) {
           header("Location: index.php?=view=shop");
           exit();
       }
        require_once "Views/single.php";
    }
}
