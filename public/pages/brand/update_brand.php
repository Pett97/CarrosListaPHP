<?php

require "/var/www/app/models/Brand.php";

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "PUT") {
  header("Location: /pages/brand/list_brand.php");
  exit;
}

$id = intval($_POST["idBrandForEdit"]);
$brand = Brand::findByID($id);

$newNameBrand = trim($_POST["newNameBrand"]);
if ($brand !== null) {
  $brand->setName($newNameBrand);
  $brand->save(); 
  header("Location: /pages/brand/list_brand.php");
}

$title = "Editar {$brand->getName()} ";
$view = "/var/www/app/views/brands/edit_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
