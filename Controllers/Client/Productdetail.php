<?php
class ProductdetailController{
    private $productModel;
    private $categoryModel;
    private $commentModel;
    public function __construct($connection)
    {
        $this->productModel = new Product($connection);
        $this->categoryModel = new Category($connection);
        $this->commentModel = new Comment($connection);
    }
    public function index($id){
         if (!$id) {
            die("Thiếu ID sản phẩm");
        }
        $productOne = $this->productModel->getOneProduct($id, 1);
        $productsAll = $this->productModel->getAllProducts();
        $categoryAll = $this->categoryModel->getAllCategory(1,10);
       

        if (!$productOne) {
            die("Sản phẩm không tồn tại");
        }
        
        

    }
}