<?php
//arquivo delete.php
$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "DELETE") {
  header("Location: /pages/brand/list_brand.php");
  exit;
}

$brandDelete = intval($_POST["brand_delete"]); //para pegar a linha

define('DB_PATH', '../../../database/brand.txt');

$brands = file(DB_PATH, FILE_IGNORE_NEW_LINES);


if (isset($brands[$brandDelete])) {

  unset($brands[$brandDelete]);

  file_put_contents(DB_PATH, implode(PHP_EOL, $brands));
  header("Location: /pages/brand/list_brand.php");
} else {
  header("Location: /pages/brand/list_brand.php");
}
