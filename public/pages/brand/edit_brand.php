<?php
define("DB_PATH", "../../../database/brand.txt");

require "/var/www/app/models/Brand.php";

$brands = file(DB_PATH, FILE_IGNORE_NEW_LINES);

$brandID = intval($_GET["brand_id"]);
$brand = Brand::findByID($brandID);

$title = "Editar {$brand->getName()}";
$view = "/var/www/app/views/brands/edit_brand.phtml";



require "/var/www/app/views/layouts/application.phtml";
