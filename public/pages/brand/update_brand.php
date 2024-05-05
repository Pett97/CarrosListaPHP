<?php

require "/var/www/app/models/Brand.php";

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "PUT") {
  header("Location: /pages/brands/list_brand.php");
  exit;
}

$brandName = strtoupper(($_POST["brandEdit"]));
var_dump($brandName);
$brand = Brand::findByName($brandName);
var_dump($brand);

$newNameBrand = trim($_POST["newNameBrand"]);
if ($brand !== null) {
  $brand->setName($newNameBrand);
  $brand->save();
}

$title = "Editar $brandName ";
$view = "/var/www/app/views/brands/edit_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
