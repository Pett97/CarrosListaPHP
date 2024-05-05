<?php

require "/var/www/app/models/Brand.php";


$brandID = $_GET["brand_id"];
$brandID =(intval($brandID));
$brand = Brand::findByID($brandID);

if ($brand !== null) {
    $teste = $brand->getName();
    $title = "Detalhes $teste";
} else {
    $title = "Detalhes da Marca Desconhecida";
}
//$brandName = trim(strtoupper($brandName));


$view = "/var/www/app/views/brands/detail_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
