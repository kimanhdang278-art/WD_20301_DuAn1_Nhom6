<div class="card">
    <div class="card-header">
        Danh Sách Giỏ Hàng
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
                    <th scope="col">Mã người dùng</th>
                    <th scope="col">Tổng</th>
                    <th scope="col">Thời gian</th>
                    <th scope="col">Tên người dùng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($orderList['data'] as $order):

                ?>
                    <tr>
                        <th scope="row"><?= $order['id'] ?></th>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['total_amount'] ?></td>
                        <td><?= $order['status'] ?></td>
                        <td><?= $order['created_at'] ?></td>
                        <td><?= $order['receiver_name'] ?></td>
                        <td><?= $order['receiver_phone'] ?></td>
                        <td><?= $order['receiver_address'] ?></td>
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
                // var_dump($userList['total']);
                $totalPages = ceil($orderList['total'] / $limit);
                ?>
                <li class="page-item"><a class="page-link" href="?role=admin&module=order&page=1">Trước</a></li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?role=admin&module=order&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <li class="page-item"><a class="page-link" href="role=admin&module=order&page=<?= $totalPages ?>">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>