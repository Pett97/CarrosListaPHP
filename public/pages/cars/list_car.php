<?php
require "/var/www/app/models/Car.php";

$cars = Car::all();

$title = "Lista De Carros";

$view = "/var/www/app/views/cars/list_car.phtml";

require "/var/www/app/views/layouts/application.phtml";
