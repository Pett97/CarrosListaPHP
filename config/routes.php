<?php

use App\Controllers\CarsController;
use App\Controllers\BrandsController;
use Core\Router\Route;

//Brands
Route::get("/", [BrandsController::class,"index"])->name("root");
Route::get("/brands", [BrandsController::class,"index"])->name("brands");
Route::get("/brands/new", [BrandsController::class,"new"])->name("new_brand");



//Cars
Route::get("/cars", [CarsController::class,"index"])->name("cars");
Route::get("/cars/new", [CarsController::class,"new"])->name("new_car");
