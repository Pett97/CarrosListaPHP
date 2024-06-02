<?php

use Core\Router\Route;
use App\Controllers\CarsController;
use App\Controllers\BrandsController;

//Brands
Route::get("/", [BrandsController::class, "index"])->name("root");



//create

Route::get("/brands/new", [BrandsController::class, "new"])->name("new.brand");

Route::post("/brands", [BrandsController::class, "create"])->name("create.brand");

// Retrieve
Route::get("/brands", [BrandsController::class, "index"])->name("brands.list");
Route::get("/brand/{id}", [BrandsController::class, "show"])->name("brands.show");

// Update

Route::get("/brand/{id}/edit", [BrandsController::class, "edit"])->name("brand.edit");
Route::put("/brands/update/{id}", [BrandsController::class, "update"])->name("brand.update");

//Delete
Route::delete("/brands/{id}", [BrandsController::class, "delete"])->name("brand.destroy");

//Cars
Route::get("/cars", [CarsController::class, "index"])->name("cars");

Route::get("/cars", [CarsController::class, "new"])->name("new.car");

Route::post("/cars/new", [CarsController::class, "create"])->name("create.car");

Route::get("/cars/{id}", [CarsController::class, "edit"])->name("cars.edit");

Route::put("/cars/{id}", [CarsController::class, "update"])->name("cars.update");

Route::delete("/cars/{id}", [CarsController::class, "destroy"])->name("cars.destroy");
