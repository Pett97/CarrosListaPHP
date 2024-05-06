<?php

require "/var/www/app/models/Car.php";

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "PUT") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$id = intval($_POST["idCarForEdit"]);

$car = Car::findByID($id);

$newCarName = trim($_POST["newNameCar"]);

if($car !==null){
  $car->setName($newCarName);
  $car->save();
  header("Location: /pages/cars/list_car.php");
}

$title = "Editar {$car->getName()} ";
$view = "/var/www/app/views/cars/edit_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
?>
