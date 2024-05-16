<?php

require '/var/www/config/bootstrap.php';

use App\Controllers\BrandsController;

$controller = new BrandsController();
$controller->delete();
