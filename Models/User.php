<?php
class User
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    public function getAllUser()
    {
        $query = "SELECT * FROM `user`;";

        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
