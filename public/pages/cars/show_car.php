<?php

require "/var/www/app/models/Car.php";

$carName = $_GET['car_name'];

$car = Car::findByName($carName);

$title = "Detalhes $carName ";
$view = "/var/www/app/views/cars/detail_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
