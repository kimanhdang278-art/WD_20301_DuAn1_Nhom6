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
            }
            break;
    }
} else {

    $view = isset($_GET['view']) ? $_GET['view'] : '';

    switch ($view) {
        case ' single-product':
            break;
        case'shop':
            require_once "Controllers/Client/ShopController.php";
            $shopController = new ShopController($connection);
            $shopController->index();
            break;
        case'about':
            require_once "Controllers/Client/AboutController.php";
            $aboutController = new AboutController($connection);
            $aboutController->index();
            break;
        case'contact':
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
