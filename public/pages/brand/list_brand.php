<?php


require "/var/www/app/models/Brand.php";

$brands = Brand::all();

$title = "Lista de Marcas";
$view = "/var/www/app/views/brands/list_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
