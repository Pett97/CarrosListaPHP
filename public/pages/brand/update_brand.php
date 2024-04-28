<?php

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "PUT") {
  header("Location: /pages/bran/list_brand.php");
  exit;
}

$brandName = trim($_POST["brandEdit"]);
$newName = trim($_POST["newBrand"]);

$erros = [];

if (empty($newName)) {
  $erros[$newName] = "nome da Marca nao pode fazio ";
}

if (empty($erros)) {
  define('DB_PATH', '/var/www/database/brand.txt');

  $brands = file(DB_PATH, FILE_IGNORE_NEW_LINES);
  $indexes = array_keys($brands, $brandName);

  foreach ($indexes as $index) {
    $brands[$index] = $newName;
  }

  $updateBrands = implode(PHP_EOL, $brands);
  file_put_contents(DB_PATH, $updateBrands);

  header("Location: /pages/brand/list_brand.php");
  exit;
} else {
  $title = "Editar $brandName ";
  $view = "/var/www/app/views/brands/edit_brand.phtml";

  require "/var/www/app/views/layouts/application.phtml";
}
?>
