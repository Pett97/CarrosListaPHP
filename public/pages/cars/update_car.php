<?php

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "PUT") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$carName = trim($_POST["carEdit"]);
$newName = trim($_POST["newCar"]);

$erros = [];

if (empty($newName)) {
  $erros[$newName] = "nome do carro não pode ser vazio";
}

if (empty($erros)) {
  define('DB_PATH', '/var/www/database/cars.txt');

  $cars = file(DB_PATH, FILE_IGNORE_NEW_LINES);
  $indexes = array_keys($cars, $carName);

  foreach ($indexes as $index) {
    $cars[$index] = $newName;
  }

  $updateCars = implode(PHP_EOL, $cars);
  file_put_contents(DB_PATH, $updateCars);

  header("Location: /pages/cars/list_car.php");
  exit;
} else {
  $title = "Editar $carName ";
  $view = "/var/www/app/views/cars/edit_car.phtml";

  require "/var/www/app/views/layouts/application.phtml";
}
?>
