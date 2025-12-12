<?php
class Category
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * hàm lấy danh sách người dùng với phân trang và tìm kiếm
     * @param int $page trang hiện tại
     * @param int $limit số người dùng trên mỗi trang 
     * @param string $keyword từ khóa tìm kiếm
     * @return array danh sách người dùng 
     * @return int $active  trạng thái người dùng (1: active, 0: inactive)
     * @return string $sortData sắp xếp dữ liệu ngày tạo (asc: tăng dần, desc: giảm dần)
     */
     public function countCategory()
    {
        $query = "SELECT COUNT(*) as total FROM `categories`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }
    public function getAllCategory($page = 1, $limit = 10, $keyword = '')
    {
        $offset = ($page - 1) * $limit;
        $search = '';

        if (trim($keyword) !== '') {
            $search =" WHERE `name' LIKE '%$keyword%' ";
        }else {
            $search = ' WHERE 1';
        }
        if ($keyword !== '') {
            $search = "AND `name` LIKE '%$keyword%' ";
        } else {
            $search = '';
        }

        $query = "SELECT * FROM `categories` WHERE 1  $search LIMIT :limit OFFSET :offset";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
      
        $result['total'] = $this->countCategory();
        $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Hàm lấy chi tiết một sản phẩm theo ID
     * @param int $id ID sản phẩm
     * @param int $active trạng thái sản phẩm (1: active, 0:
     * @return array chi tiết sản phẩm
     */
    public function getOneCategory($id)
    {

        $query = "SELECT * FROM `categories` WHERE `id` = :id ";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategory($data)
    {
        $query = "INSERT INTO `categories`(
                `name`, 
            ) 
            VALUES (
                :name,
            )";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
    }
    function updateCategory($data)
    {
        $query = "UPDATE `categories` 
              SET 
                `name` = :name,
              WHERE `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        return $stmt->execute();
    }
    function deleteCategory($id)
    {
        $query = "DELETE FROM `categories` WHERE  `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}