<?php
require __DIR__ . '/../vendor/autoload.php';
use Core\Constants\Constants;
use Core\Errors\ErrorsHandler;

Constants::rootPath();


//require_once __DIR__ . "/../core/constants/general.php";
require "/var/www/core/Erros/ErrorsHandler.php";
require "/var/www/core/env/env.php";

ErrorsHandler::init();
