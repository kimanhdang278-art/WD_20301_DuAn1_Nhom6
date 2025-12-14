<?php

class CartController {
    private $cartMolel;

    public function __construct($connection) {
        $this->cartMolel = new Cart($connection);
    }

    public function index() {
        if(!isset($_SESSION['user'])) {
            header("Location: index.php?view=login");
        }

        $CartItems = $this->cartMolel->getCartItemsByUserId($_SESSION['user']['id']);


        require_once "Views/Client/cart.php";
    }
}