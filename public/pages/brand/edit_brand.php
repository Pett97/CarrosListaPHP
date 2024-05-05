<?php


require "/var/www/app/models/Brand.php";



$brandID = intval($_GET["brand_id"]);
$brand = Brand::findByID($brandID);

$title = "Editar {$brand->getName()}";
$view = "/var/www/app/views/brands/edit_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
