<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/brand/list_brand.php");
}

$brandName = $_POST["brand_name"];

define("DB_PATH", "/var/www/database/brand.txt");

file_put_contents(DB_PATH, $brandName . PHP_EOL, FILE_APPEND);

header("Location: /pages/brand/list_brand.php");
