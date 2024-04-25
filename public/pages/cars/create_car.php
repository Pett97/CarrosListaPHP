<?php

$method = $_SERVER["REQUEST_METHOD"];

if ($method !== "POST") {
  header("Location: /pages/cars/list_car.php");
  exit;
}

$carName = $_POST["car_name"];

define('DB_PATH', '/var/www/database/cars.txt');

file_put_contents(DB_PATH,$carName. PHP_EOL,FILE_APPEND);

header("Location: /pages/cars/list_car.php");



