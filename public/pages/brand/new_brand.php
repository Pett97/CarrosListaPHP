<?php
require_once "/var/www/core/errors/handler.php";
use core\errors\ErrorsHandler;


$handler = new ErrorsHandler;
$title = "Nova Marca";
$view = "/var/www/app/views/brands/new_brand.phtml";


require "/var/www/app/views/layouts/application.phtml";
