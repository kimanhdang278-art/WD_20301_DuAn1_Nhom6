<?php
require_once "Models/Comment.php";
class CommentController
{
    private $connection;
    private $commentModel;

    public function __construct($connection)
    {
        $this->connection = $connection;
        $this->commentModel = new Comment($this->connection);
    }

    public function index()
    {
        $commentList = $this->commentModel->getAllComment(1, 10);
        require_once "admin/comment.php";
    }
}
