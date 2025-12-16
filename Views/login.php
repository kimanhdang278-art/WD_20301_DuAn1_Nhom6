<?php
require_once "Views/header.php";

$array = [
    "components/layouts/header.php",
    "Views/components/auth/login.php",
    "components/layouts/footer.php"
];
foreach ($array as $component) {
    require_once($component);
}
require_once "Views/footer.php";
