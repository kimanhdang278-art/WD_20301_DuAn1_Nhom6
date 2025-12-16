<?php
class Comment
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function createGuest($productId, $user_id, $rating, $comment)
    {
        $sql = "INSERT INTO reviews (user_id, product_id, rating, comment)
            VALUES (:user_id, :product_id, :rating, :comment)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $productId,
            ':rating' => $rating,
            ':comment' => $comment
        ]);
    }

    public function getByProduct($productId)
    {
        $sql = "SELECT * FROM reviews
                WHERE product_id = :product_id
                ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':product_id' => $productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
