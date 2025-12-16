<?php


class CommentController
{
    private $commentModel;

    public function __construct($connection)
    {
        $this->commentModel = new Comment($connection);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php");
            exit;
        }

        $product_id = $_POST['product_id'] ?? null;
        $user_id      = trim($_POST['user_id'] ?? '');
        $rating    = $_POST['rating'] ?? null;
        $comment   = trim($_POST['comment'] ?? '');

        if (!$product_id || !$user_id || !$rating || !$comment) {
            die("Vui lòng nhập đầy đủ thông tin");
        }

        $this->commentModel->createGuest(
            $product_id,
            $user_id,
            $rating,
            $comment
        );

        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}