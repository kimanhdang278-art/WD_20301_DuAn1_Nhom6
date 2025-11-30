<?php
require_once "header.php";
$array = [
    "components/layouts/header.php",
    "components/single-product/product_detatils.php",
    // "components/single-product/info.php",
    // "components/single-product/product-related.php",
    "components/layouts/footer.php",
];

foreach ($array as $component) {
    require_once($component);
}
require_once "footer.php";