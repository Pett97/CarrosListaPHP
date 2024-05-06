<?php
//arquivo delete.php
require "/var/www/app/models/Car.php";

$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "DELETE") {
  
  exit;
}else{
  $id = intval($_POST["id_delete"]);
  $car = Car::findByID($id);
  $car->destroy();
  header("Location: /pages/cars/list_car.php");
}


