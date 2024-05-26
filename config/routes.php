<?php

use App\Controllers\CarsController;
use App\Controllers\BrandsController;
use Core\Router\Route;

Route::get("/", [BrandsController::class,"index"]);
Route::get("/pages/cars/list_car.php", [CarsController::class,"index"]);
Route::get("/pages/cars/new_car.php", [CarsController::class,"new"]);

Route::get("/pages/brand/list_brand.php", [BrandsController::class,"index"]);
