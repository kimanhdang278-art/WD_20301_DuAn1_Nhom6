<?php
class Cart
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * hàm lấy danh sách giỏ Hàngvới phân trang và tìm kiếm
     * @param int $page trang hiện tại
     * @param int $limit số giỏ Hàngtrên mỗi trang 
     * @param string $user_id  ID người dùng
     * @return array danh sách giỏ Hàng
     */
    public function getAllCart( int $user_id,int $page = 1,int $limit = 10, ) 
    {
        $offset = ($page - 1) * $limit;
        $search = '';

        $query = "SELECT * FROM `cart_item` JOIN `products` ON `products`.`id` = `cart_item`.`id` WHERE `user_id = user_id LIMIT :limit OFFSET :offset";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Hàm lấy chi tiết một sản phẩm theo ID
     * @param int $id ID sản phẩm
     * @param int $active trạng thái sản phẩm (1: active, 0:
     * @return array chi tiết sản phẩm
     */
    public function getOneCart($id)
    {

        $query = "SELECT * FROM `cart_item` WHERE `id` = :id ";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function creatcart_item($data)
    {


    }
}