<div class="card">
    <div class="card-header">
        Danh Sách Danh Mục
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
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Thời gian</th>

                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usertList['data'] as $user):

                ?>
                    <tr>
                        <th scope="row"><?= $user['id'] ?></th>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?>VND</td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['password'] ?></td>
                        <td><?= $user['created_at'] ?></td>
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
                $totalPages = ceil($userList['total'] / $limit);
                ?>
                <li class="page-item"><a class="page-link" href="?role=admin&module=user&page=1">Trước</a></li>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?role=admin&module=user&page=<?= $i ?>"><?= $i ?></a></li>
                <?php endfor; ?>

                <li class="page-item"><a class="page-link" href="role=admin&module=user&page=<?= $totalPages ?>">Sau</a></li>
            </ul>
        </nav>
    </div>
</div>