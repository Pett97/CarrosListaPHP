<?php

$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$carName = trim($_POST["car"]);

$erros = [];

if (empty($carName)) {
  $erros[$carName] = "nome do carro não pode ser vazio";
}

if (empty($erros)) {
  define('DB_PATH', '/var/www/database/cars.txt');

  file_put_contents(DB_PATH, $carName . PHP_EOL, FILE_APPEND);
  header("Location: /pages/cars/list_car.php");
} else {
  $title = "Novo Carro";
  $view = "/var/www/app/views/cars/new_car.phtml";


  require "/var/www/app/views/layouts/application.phtml";
}
