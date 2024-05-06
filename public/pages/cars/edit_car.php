<?php
require "/var/www/app/models/Car.php";

$carID = intval($_GET['car_id']);
$car = Car::findByID($carID);

$title = "Editar {$car->getName()} ";
$view = "/var/www/app/views/cars/edit_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
