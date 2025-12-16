<?php
class Order
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

    public function countOrder()
    {
        $query = "SELECT COUNT(*) as total FROM `order`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }
    public function getAllOrder(int $page = 1, int $limit = 10, $keyword = '')
    {
        $offset = ($page - 1) * $limit;
         if (trim($keyword) !== '') {
            $search = " WHERE `receiver_name' LIKE '%$keyword%' OR `status` = '%$keyword%' ";
        } else {
            $search = ' WHERE 1';
        }
        if ($keyword !== '') {
            $search = "AND `receiver_name` LIKE '%$keyword%' ";
        } else {
            $search = '';
        }

        $query = "SELECT * FROM `order` WHERE 1  $search LIMIT :limit OFFSET :offset" ;

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

        $stmt->execute();
        $result['total'] = $this->countOrder();
        $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Hàm lấy chi tiết một sản phẩm theo ID
     * @param int $id ID sản phẩm
     * @param int $active trạng thái sản phẩm (1: active, 0:
     * @return array chi tiết sản phẩm
     */
    public function getOneOrder($id)
    {

        $query = "SELECT * FROM `order` WHERE `id` = :id ";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}