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
    }
} else {
}
