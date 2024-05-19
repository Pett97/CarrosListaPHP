<?php
require __DIR__ . '/../vendor/autoload.php';
use Core\Constants\Constants;
use Core\Env\EnvLoader;
use Core\Erros\ErrorsHandler;

Constants::rootPath();
ErrorsHandler::init();
EnvLoader::init();



