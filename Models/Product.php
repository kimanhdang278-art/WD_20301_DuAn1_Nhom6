<?php
class Product
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllProducts()
    {
        $query = "SELECT * FROM `products`;";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
