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

    public function countProduct()
    {
        $query = "SELECT COUNT(*) as total FROM `products`";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }

    public function getAllProducts($page = 1, $limit = 10, $keyword = '', $active = null)
    {
        $result = [];

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

        $result['total'] = $this->countProduct();
        $result['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
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

    public function createProduct($data)
    {
        $query = "INSERT INTO `products` (
                `category_id`, 
                `name`, 
                `price`, 
                `stock`, 
                `description`, 
                `image`, 
                `organic_certified`, 
                `is_active`
            ) 
            VALUES (
                :category_id,
                :name,
                :price,
                :stock,
                :description,
                :image,
                :organic_certified,
                :is_active
            )";

        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $data['price'], PDO::PARAM_STR);
        $stmt->bindValue(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $data['image'], PDO::PARAM_STR);
        $stmt->bindValue(':organic_certified', $data['organic_certified'], PDO::PARAM_INT);
        $stmt->bindValue(':is_active', $data['is_active'], PDO::PARAM_INT);

        // var_dump($this->connection);
        return $stmt->execute();
    }
    function updateProduct($data)
    {
        $query = "UPDATE `products` 
              SET 
                `category_id` = :category_id,
                `name` = :name,
                `price` = :price,
                `stock` = :stock,
                `description` = :description,
                `image` = :image,
                `organic_certified` = :organic_certified,
                `is_active` = :is_active
              WHERE `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
        $stmt->bindValue(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $data['price'], PDO::PARAM_STR);
        $stmt->bindValue(':stock', $data['stock'], PDO::PARAM_INT);
        $stmt->bindValue(':description', $data['description'], PDO::PARAM_STR);
        $stmt->bindValue(':image', $data['image'], PDO::PARAM_STR);
        $stmt->bindValue(':organic_certified', $data['organic_certified'], PDO::PARAM_INT);
        $stmt->bindValue(':is_active', $data['is_active'], PDO::PARAM_INT);
        $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);
        return $stmt->execute();
    }
    function deleteProduct($id)
    {
        $query = "DELETE FROM `products` WHERE  `id` = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
