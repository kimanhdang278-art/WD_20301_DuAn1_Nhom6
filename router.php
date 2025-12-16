<?php

$role = isset($_GET['role']) ? $_GET['role'] : '';


if ($role === 'admin') {
    $module = isset($_GET['module']) ? $_GET['module'] : '';

    switch ($module) {
        case 'products':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/ProductController.php";
            $productController = new ProductController($connection);
            switch ($action) {
                case 'index':
                    $productController->index();
                    break;
                case 'create':
                    $productController->create();
                    break;
                case 'store':
                    $productController->store();
                    break;
                case 'edit':
                    $productController->edit();
                    break;
                case 'update':
                    $productController->update();
                    break;
                case 'delete':
                    $productController->delete();
                    break;
                default:
                    require_once "Controllers/Admin/DashboardController.php";
                    $dashboardController = new DashboardController();
                    $dashboardController->index();
            }
            break;

        case 'category':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/CategoryController.php";
            $categoryController = new CategoryController($connection);
            switch ($action) {
                case 'index':
                    $categoryController->index();
                    break;
                case 'create':
                    $categoryController->create();
                    break;
                case 'store':
                    $categoryController->store();
                    break;
                case 'edit':
                    $categoryController->edit();
                    break;
                case 'update':
                    $categoryController->update();
                    break;
                case 'delete':
                    $categoryController->delete();
                    break;
                default:
                    require_once "Controllers/Admin/DashboardController.php";
                    $dashboardController = new DashboardController();
                     $dashboardController->index();
            }
            break;

        case 'user':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/UserContronller.php";
            $userController = new UserController($connection);
            switch ($action) {
                case 'index':
                    $userController->index();
                    break;
                default:
                    require_once "Controllers/Admin/DashboardController.phpp";
                    $dashboardController = new DashboardController();
                     $dashboardController->index();
            }
            break;

        case 'order':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Admin/OrderController.php";
            $orderController = new OrderController($connection);
            switch ($action) {
                case 'index':
                    $orderController->index();
                    break;
                default:
                    require_once "Controllers/Admin/DashboardController.phpp";
                    $dashboardController = new DashboardController();
                     $dashboardController->index();
            }
            break;
    }
} else {
    $view = $_GET['view'] ?? '';
  
    switch ($view) {
        case 'cart':
            $action = isset($_GET['action']) ? $_GET['action'] : 'index';
            require_once "Controllers/Client/CartController.php";
            $cartController = new CartController($connection);
            switch ($action) {
                case'index':
                $cartController->index(1);
                 break;

                case 'add':
                $product_id = $_GET['id'] ?? 0;
                $cartController->add($product_id);
                 break;

                case 'delete':
                $cartController->delete($id);
                break;

                default:
                $cartController->index();
                break;
            } 
          break;
        

        case 'shop':
            require_once "Controllers/Client/ShopController.php";
            $shopController = new ShopController($connection);
            $shopController->index();
            break;
        case 'productdetail':
            require_once "Controllers/Client/Productdetail.php";
            $detailController = new ProductDetailController($connection);
            $id = $_GET['id'] ?? null;
            $detailController->index($id);
            break;
        case 'about':
            require_once "Controllers/Client/AboutController.php";
            $aboutController = new AboutController($connection);
            $aboutController->index();
            break;
        case 'contact':
            require_once "Controllers/Client/ContactController.php";
            $contactController = new ContactController($connection);
            $contactController->index();
            break;
        
        default;
            require_once "Controllers/Client/HomeController.php";
            $homeController = new HomeController($connection);
            $homeController->index();
            break;
    }
}
