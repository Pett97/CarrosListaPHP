<?php
define("DB_PATH", "../../../database/brand.txt");

$brands = file(DB_PATH, FILE_IGNORE_NEW_LINES);

$brandName = $_GET["brand_name"];

$title = "Detalhes $brandName";

$view = "/var/www/app/views/brands/detail_brand.phtml";

require "/var/www/app/views/layouts/application.phtml";
