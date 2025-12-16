<?php
class Comment
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function add($data)
    {
       $sql = "INSERT INTO reviews (user_id, product_id, rating, comment, created_at)
                VALUES (?, ?, ?, ?, NOW())";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['user_id'],
            $data['product_id'],
            $data['rating'],
            $data['comment']
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
