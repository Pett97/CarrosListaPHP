<?php

require "/var/www/app/models/Brand.php";

$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/brand/list_brand.php");
}


$brandName = trim($_POST["brand_name"]);
$brand = new Brand(name:$brandName);
$erros = [];

if($brand->save()){
  header("Location: /pages/brand/list_brand.php");
}else{
  $title = "Nova Marca";
  $view = "/var/www/app/views/brands/list_brand.phtml";
}