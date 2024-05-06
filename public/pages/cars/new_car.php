<?php
//new php
require "/var/www/app/models/Car.php";

$title = "Novo Carro";
$view = "/var/www/app/views/cars/new_car.phtml";


if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $carName = trim($_POST["car"]);
  $car = new Car($carName);

  if ($car->save()) {
      header("Location: /pages/cars/list_car.php");
      exit;
  }

}
require "/var/www/app/views/layouts/application.phtml";

