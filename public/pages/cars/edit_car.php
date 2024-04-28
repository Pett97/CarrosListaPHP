<?php
define("DB_PATH", "../../../database/cars.txt");

$cars = file(DB_PATH, FILE_IGNORE_NEW_LINES);

$carName = $_GET['car_name'];

$title = "Editar $carName ";
$view = "/var/www/app/views/cars/edit_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
