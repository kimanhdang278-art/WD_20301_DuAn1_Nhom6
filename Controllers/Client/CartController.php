<?php
class CartController
{
    private $cartModel;

    public function __construct($connection)
    {
        $this->cartModel = new Cart($connection);
    }
    public function index() {
        $user_id = 1;
        $cart = $this->cartModel->getCartByUser($user_id);
        require_once 'Views/cart.php';
    }
    public function add($product_id) {
        $user_id = 1;
        $quantity = 1;
        if ($product_id <= 0) {
            die('Thiếu product_id');
        }

        $this->cartModel->add($user_id,$product_id,$quantity);
        header('Location:?view=cart');
        exit;
    }
    public function delete($id) {
    
        $id = $_GET['id'] ?? null;

        if ($id) {
            $this->cartModel->deleteItem($id);
        }

        header("Location: ?view=cart");
        exit;

    }
}
