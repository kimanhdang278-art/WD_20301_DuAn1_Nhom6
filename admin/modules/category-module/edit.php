<?php
include "admin/header.php";
include "admin/components/sidebar.php";
?>

<div class="body-wrapper">
    <?php include "admin/components/header.php"; ?>

    <div class="body-wrapper-inner">
        <div class="container-fluid">

            <form action="?role=admin&module=category&action=update"
                  method="POST"
                  class="p-4 border rounded shadow-sm bg-light">

                <h4 class="mb-3">Sửa danh mục</h4>

                <!-- ID ẩn -->
                <input type="hidden" name="id" value="<?= $category['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Tên danh mục</label>
                    <input type="text"
                           class="form-control"
                           name="name"
                           value="<?= htmlspecialchars($category['name']) ?>"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="?role=admin&module=category&action=index"
                   class="btn btn-secondary">Quay lại</a>
            </form>

        </div>
    </div>
</div>

<?php include "admin/footer.php"; ?>
