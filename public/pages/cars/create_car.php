<?php

require  '/var/www/app/models/Car.php';

$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$params = trim($_POST["car"]);
$car = new Car(name: $params);

if ($car->save()) {
  header("Location: /pages/cars/list_car.php");
} else {
  $title = "Novo Carro";
  $view = "/var/www/app/views/cars/new_car.phtml";
}

