<div class="card">
    <div class="card-header">
        Danh Sách Bình Luận 
    </div>
    <div class="card-body">
        <div class="row">
            <form action="">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm">
                        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-reponsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Người dùng</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Đánh giá</th>
                    <th scope="col">Bình luận</th>
                    <th scope="col">Thời gian</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commentList['data'] as $comment): ?>
                    <tr>
                        <th scope="row"><?= $comment['id'] ?></th>
                        <td><?= $comment['user_id'] ?></td>
                        <td><?= $comment['product_id'] ?></td>
                        <td><?= $comment['rating'] ?></td>
                        <td><?= $comment['comment'] ?></td>
                        <td><?= $comment['created_at'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                $role = isset($_GET['role']) ? (int)$_GET['role'] : 1;
                $limit = 10;
                $totalPages = ceil($commentList['total'] / $limit);
                ?>
                <li class="page-item"><a class="page-link" href="?role=admin&module=comment&page=1">Trước</a></li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?role=admin&module=comment&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <li class="page-item"><a class="page-link" href="role=admin&module=comment&page=<?= $totalPages ?>">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>