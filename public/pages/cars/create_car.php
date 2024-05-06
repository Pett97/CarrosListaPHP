<?php
//create_car.php
require "/var/www/app/controllers/CarsController.php";

$controller = new CarsController();
$controller->create();

