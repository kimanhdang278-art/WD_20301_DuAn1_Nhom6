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
            <form action="?role=admin&module=category&action=store"
                method="POST"
                class="p-4 border rounded shadow-sm bg-light">

             
                <h4 class="mb-3">Thêm danh mục sản phẩm</h4>

                <div class="mb-3">
                    <label class="form-label">Tên danh mục sản phẩm</label>
                    <input type="text" class="form-control"
                        name="name" id="name" placeholder="Nhập tên danh mục sản phẩm">
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
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