<?php
require_once "header.php";
$array = [
    "components/layouts/header.php",
    // "components/shop/navbar.php",
    "components/shop/modal.php",
    "components/shop/single.php",
    "components/shop/fruits.php",
    "components/layouts/footer.php",
];

foreach ($array as $component) {
    require_once($component);
}

require_once "footer.php";