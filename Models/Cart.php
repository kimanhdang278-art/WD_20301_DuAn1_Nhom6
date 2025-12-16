<?php
class Cart
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * Thêm giỏ hàng
     * 
     */
    public function add($user_id, $product_id, $quantity = 1)
    {
        $checkSql = "SELECT id, quantity FROM cart_item WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->connection->prepare($checkSql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':product_id' => $product_id
        ]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            $updateSql = "UPDATE cart_item SET quantity = quantity + :quantity WHERE id = :id";
            $updateStml = $this->connection->prepare($updateSql);
            return $updateStml->execute([
                ':quantity' => $quantity,
                ':id' => $item['id']
            ]);
        }

        $insertSql = "INSERT INTO cart_item (user_id, product_id, quantity, added_at) VALUES (:user_id, :product_id, :quantity, NOW())";
        $insertStml = $this->connection->prepare($insertSql);
        return $insertStml->execute([
            ':user_id' => $user_id,
            ':product_id' => $product_id,
            ':quantity' => $quantity,
        ]);
    }

    public function getCartByUser($user_id)
    {
        $sql = "SELECT c.*, p.name, p.price, p.image FROM cart_item c JOIN products p ON c.product_id = p.id WHERE c.user_id = :user_id";
        $stml = $this->connection->prepare($sql);
        $stml->execute([':user_id' => $user_id]);
        return $stml->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteItem($id)
    {
        $stmt = $this->connection->prepare(
            "DELETE FROM cart_item WHERE id = :id"
        );
        return $stmt->execute([':id' => $id]);
    }
}
