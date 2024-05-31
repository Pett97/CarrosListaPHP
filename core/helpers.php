<?php

use Core\Debug\Debugger;
use Core\Router\Router;

function dd(): void
{
    Debugger::dd(func_get_args());
}

if(!function_exists("route")){
    function route(string $name){
         return Router::getInstance()->getRoutePathByName( $name);
    }
}
