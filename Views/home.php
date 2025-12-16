<?php
$array = [
    "components/layouts/header.php",
    "components/home/modal.php",
    "components/home/hero.php",
    "components/home/featurs.php",
    "components/home/fruits.php",
    "components/home/featursS.php",
    "components/home/vesitable.php",
    "components/home/banner.php",
    "components/home/bestsaler.php",
    "components/home/fact.php",
    "components/home/tastimonial.php",
    "components/layouts/footer.php",
];

foreach ($array as $component) {
    require_once($component);
}