<?php
include "header.php";
include "components/sidebar.php";
?>

<!-- Main wrapper -->
<div class="body-wrapper">
    <?php 
    include "components/header.php"; 
    ?>

    <div class="body-wrapper-inner">
        <div class="container-fluid">

            <?php
             include "modules/category/index.php";
            ?>

            <div class="py-6 px-6 text-center">
                <p class="mb-0 fs-4">Design and Developed by <a href="#" class="pe-1 text-primary text-decoration-underline">WrapPixel</a></p>
                <p class="mb-0 fs-4">Distributed by <a href="#" class="pe-1 text-primary text-decoration-underline">ThemeWagon</a></p>
            </div>

        </div>
    </div>
</div>

<?php include "footer.php"; ?>
