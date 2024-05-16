<?php

require '/var/www/config/bootstrap.php';

use App\Controllers\CarsController;

$controller = new CarsController();
$controller->index();
