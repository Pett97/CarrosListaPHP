<?php

require "/var/www/app/models/Brand.php";

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "DELETE") {
  header("Location: /pages/brand/list_brand.php");
  exit;
}else{
  $id = intval($_POST["id_delete"]);
  $brand = Brand::findByID($id);
  $brand->destroy();
  header("Location: /pages/brand/list_brand.php");
}


