<?php
class Product
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * hàm lấy danh sách sản phẩm với phân trang và tìm kiếm
     * @param int $page trang hiện tại
     * @param int $limit số sản phẩm trên mỗi trang 
     * @param string $keyword từ khóa tìm kiếm
     * @return array danh sách sản phẩm 
     * @return int $active  trạng thái sản phẩm (1: active, 0: inactive)
     * @return string $sortData sắp xếp dữ liệu ngày tạo (asc: tăng dần, desc: giảm dần)
     */
    public function getAllProducts($page = 1, $limit = 10, $keyword = '', $active = null)
    {
        $offset = ($page - 1) * $limit;
        $search = '';

        if ($active !== null) {
            $search .= " AND `is_active` :active";
        }

        if ($keyword !== '') {
            $search = "AND `name` LIKE '%$keyword%' OR `description` LIKE '%$keyword%'";
        } else {
            $search = '';
        }

        $query = "SELECT * FROM `products` WHERE 1  $search LIMIT :limit OFFSET :offset";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * Hàm lấy chi tiết một sản phẩm theo ID
     * @param int $id ID sản phẩm
     * @param int $active trạng thái sản phẩm (1: active, 0:
     * @return array chi tiết sản phẩm
     */
    public function getOneProduct($id, $active = 1)
    {
        if ($active !== null) {
            $search = "AND `is_active` = $active";
        } else {
            $search = '';
        }
        $query = "SELECT * FROM `products` WHERE `id` = :id $search LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function creatProduct($data){
        
     
    }
}
