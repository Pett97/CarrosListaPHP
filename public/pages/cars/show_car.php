<?php
require '/var/www/config/bootstrap.php';
use App\Controllers\CarsController;

//require "/var/www/app/controllers/CarsController.php";

$controller = new CarsController();
$controller->show();


