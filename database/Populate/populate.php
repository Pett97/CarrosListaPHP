<?php
require __DIR__ . '/../../config/bootstrap.php';
use Core\Database\Database;
use Database\Populate\BrandsPopulate;
use Database\Populate\CarsPopulate;

Database::migrate();


BrandsPopulate::populate();
CarsPopulate::populate();
