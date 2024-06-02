<?php

use Core\Router\Route;
use App\Controllers\CarsController;
use App\Controllers\BrandsController;

//Brands
Route::get("/", [BrandsController::class, "index"])->name("root");
Route::get("/list.brands", [BrandsController::class, "index"])->name("brands");
Route::get("/brands/new", [BrandsController::class, "new"])->name("new.brand");
Route::post("/brands", [BrandsController::class, "create"])->name("create.brand");
Route::get("/brands/{id}", [BrandsController::class, "show"])->name("brands.show");
Route::put("/brands/{id}", [BrandsController::class, "update"])->name("brands.update");
Route::delete("/brands/{id}", [BrandsController::class, "destroy"])->name("brands.destroy");

//Cars
Route::get("/list.car", [CarsController::class, "index"])->name("cars");
Route::get("/cars", [CarsController::class, "new"])->name("new.car");
Route::post("/cars/new", [CarsController::class, "create"])->name("create.car");
Route::get("/cars/{id}", [CarsController::class, "edit"])->name("cars.edit");
Route::put("/cars/{id}", [CarsController::class, "update"])->name("cars.update");
Route::delete("/cars/{id}", [CarsController::class, "destroy"])->name("cars.destroy");
