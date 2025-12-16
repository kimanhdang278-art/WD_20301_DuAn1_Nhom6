<?php
// Controllers/ReviewController.php
class CommentController
{
    private $commentModel;

    public function __construct($conn)
    {
        $this->commentModel = new Comment($conn);
    }

    public function add()
    {
       
            $data = [
            'product_id' => $_POST['product_id'],
            'rating'     => $_POST['rating'],
            'comment'    => $_POST['comment'],
            'user_id'    => null 
        ];

            $this->commentModel->add($data);

           header("Location:?view=product-detail&id=" .$_POST['product_id']);
    }
}
