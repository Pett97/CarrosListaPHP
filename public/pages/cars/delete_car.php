<?php
//arquivo delete.php
$method = $_REQUEST['_method'] ?? $_SERVER["REQUEST_METHOD"];

if ($method !== "DELETE") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$carDelete = intval($_POST["car_delete"]); //para pegar a linha

define('DB_PATH', '../../../database/cars.txt');

$cars = file(DB_PATH, FILE_IGNORE_NEW_LINES);


if (isset($cars[$carDelete])) {

  unset($cars[$carDelete]);

  file_put_contents(DB_PATH, implode(PHP_EOL, $cars));
  header("Location: /pages/cars/list_car.php");
} else {
  header("Location: /pages/cars/list_car.php");
}
