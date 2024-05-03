<?php
$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/brand/list_brand.php");
}

$brandName = trim($_POST["brand_name"]);
$brandName = strtoupper($brandName);

$erros = [];

if (empty($brandName)) {
  $erros[$brandName] = "Nome da Marca não pode ser vazio";
}

if (empty($erros)) {
  define("DB_PATH", "/var/www/database/brand.txt");

  file_put_contents(DB_PATH, $brandName . PHP_EOL, FILE_APPEND);

  header("Location: /pages/brand/list_brand.php");
} else {
  $title = "Nova Marca";
  $view = "/var/www/app/views/brands/new_brand.phtml";


  require "/var/www/app/views/layouts/application.phtml";
}
