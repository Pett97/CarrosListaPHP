<?php

require "/var/www/app/models/Brand.php";


$brandName = $_GET["brand_name"];

$brand = Brand::findByName($brandName);

$title = "Detalhes $brandName";

$view = "/var/www/app/views/brands/detail_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
