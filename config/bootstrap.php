<?php

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . "/../core/constants/general.php";
require "/var/www/core/Erros/ErrorsHandler.php";
require "/var/www/core/env/env.php";

use Core\Errors\ErrorsHandler;


ErrorsHandler::init();
