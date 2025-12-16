<?php
include "admin/header.php";
include "admin/components/sidebar.php";
?>
<!--  Main wrapper -->
<div class="body-wrapper">
    <?php
    include "admin/components/header.php";
    ?>
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <form action="?role=admin&module=products&action=update"
                method="POST" enctype="multipart/form-data"
                class="p-4 border rounded shadow-sm bg-light">
                <h4 class="mb-3">Sửa sản phẩm</h4>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id'] ); ?>">
                <div class="mb-3">
                    <label class="form-label">Mã danh mục</label>
                    <input type="number" class="form-control" name="category_id" id="category_id" placeholder="Nhập mã danh mục" value="<?php echo htmlspecialchars($product['category_id']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm" value="<?php echo htmlspecialchars($product['name']); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Giá</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Nhập giá" value="<?php echo htmlspecialchars($product['price'] ); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Số lượng</label>
                    <input type="number" id="stock" class="form-control" name="stock" placeholder="Nhập số lượng" value="<?php echo htmlspecialchars($product['stock'] ); ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Nhập mô tả"><?php echo htmlspecialchars($product['description']); ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ảnh sản phẩm</label>
                    <?php if (!empty($product['image'])): ?>
                        <div class="mb-2"><img src="/uploads/<?php echo htmlspecialchars($product['image']); ?>" alt="" style="width:50px"></div>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="mb-3">
                    <label class="form-label">Hữu cơ (organic)</label>
                    <select class="form-select" name="organic_certified" id="organic_certified">
                        <option value="1" <?php echo (isset($product['organic_certified']) && $product['organic_certified'] == 1) ? 'selected' : ''; ?>>Có</option>
                        <option value="0" <?php echo (isset($product['organic_certified']) && $product['organic_certified'] == 0) ? 'selected' : ''; ?>>Không</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trạng thái</label>
                    <select class="form-select" name="is_active" id="is_active">
                        <option value="1" <?php echo (isset($product['is_active']) && $product['is_active'] == 1) ? 'selected' : ''; ?>>Kích hoạt</option>
                        <option value="0" <?php echo (isset($product['is_active']) && $product['is_active'] == 0) ? 'selected' : ''; ?>>Không kích hoạt</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhập</button>
            </form>


            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="#"
                        class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a> Distributed by <a
                        href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
            </div>
        </div>
    </div>
</div>




<?php include "admin/footer.php"; ?>