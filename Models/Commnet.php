<?php
class Comment
{
    private $connection;
    public function __construct($connection)
    {
        $this->connection = $connection;
    }
    /**
     * hàm lấy danh sách bình luận với phân trang và tìm kiếm
     * @param int $page trang hiện tại
     * @param int $limit số bình luận trên mỗi trang 
     * @param string $keyword từ khóa tìm kiếm
     * @return array danh sách bình luận 
     * @return int $active  trạng thái bình luận (1: active, 0: inactive)
     * @return string $sortData sắp xếp dữ liệu ngày tạo (asc: tăng dần, desc: giảm dần)
     */
     public function countComment()
    {
        $query = "SELECT COUNT(*) as total FROM `reviews`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }
    public function getAllComment($page = 1, $limit = 10, $keyword = '', $active = null)
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

        $query = "SELECT * FROM `reviews` WHERE 1  $search LIMIT :limit OFFSET :offset";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $result['total'] = $this->countComment();
        $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    /**
     * Hàm lấy chi tiết một bình luận theo ID
     * @param int $id ID bình luận
     * @param int $active trạng thái bình luận (1: active, 0:
     * @return array chi tiết bình luận
     */
    public function getOneCommnet($id, $active = 1)
    {
        if ($active !== null) {
            $search = "AND `is_active` = $active";
        } else {
            $search = '';
        }
        $query = "SELECT * FROM `reviews` WHERE `id` = :id $search LIMIT 1";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}