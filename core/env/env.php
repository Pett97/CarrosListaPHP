<?php

    $envs = parse_ini_file("/var/www/.env");

foreach ($envs as $env => $value) {
    $_ENV[$env] = $value;
}
