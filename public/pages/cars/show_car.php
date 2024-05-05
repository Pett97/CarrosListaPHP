<?php

require "/var/www/app/models/Car.php";

$carID = intval($_GET['car_id']);

$car = Car::findByID($carID);

$title = "Detalhes {$car->getName()} ";
$view = "/var/www/app/views/cars/detail_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
