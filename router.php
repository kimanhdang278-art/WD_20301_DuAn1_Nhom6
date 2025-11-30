<?php
require_once 'Models/Product.php';

$productModel = new Product($connection);
$productList = $productModel->getAllProducts();
print_r($productList);
