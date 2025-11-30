<?php

class Database
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_port;
    private $db_name;
    private $connection;

    public function __construct()
    {
        $this->db_host = DB_HOST;
        $this->db_user = DB_USER;
        $this->db_pass = DB_PASS;
        $this->db_port = PORT;
        $this->db_name = DB_NAME;
    }

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Kết nối thành công";
            return $this->connection;
        } catch (Exception $e) {
            echo "Kết nối thất bại: " . $e->getMessage() . "tại dòng " . $e->getLine() . "ở file " . $e->getFile();
            return null;
        }
    }
    public function disconnect()
    {
        $this->connection = null;
    }
}
