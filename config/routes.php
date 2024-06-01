<?php

use Core\Router\Route;
use App\Controllers\CarsController;
use App\Controllers\BrandsController;

//Brands
Route::get("/", [BrandsController::class,"index"])->name("root");
Route::get("/list.brands", [BrandsController::class,"index"])->name("brands");
Route::get("/brands/new", [BrandsController::class,"new"])->name("new.brand");
Route::post("/brands", [BrandsController::class,"create"])->name("create.brand");




//Cars
Route::get("/list.car", [CarsController::class,"index"])->name("cars");
Route::get("/cars", [CarsController::class,"new"])->name("new.car");
Route::post("/cars/new", [CarsController::class,"create"])->name("create.car");
