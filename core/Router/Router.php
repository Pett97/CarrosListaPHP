<?php

namespace Core\Router;

use Core\Constants\Constants;
use Core\Router\Route;

class Router
{
    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private static ?Router $instance = null;
    private array $routes = [];

    public function addRoute(Route $route)
    {
        $this->routes[] = $route;
    }

    public static function getInstance(): Router
    {
        if (self::$instance == null) {
            self::$instance = new Router();
        }

        return self::$instance;
    }

    public function dispatch(): object|bool
    {
        {
            $method = $_REQUEST["_method"] ?? $_SERVER["REQUEST_METHOD"];
            $uri = $_SERVER["REQUEST_URI"];

        foreach ($this->routes as $route) {
            if ($route->match($method, $uri)) {
                $class = $route->getControllerName();
                $action = $route->getActionName();


                $controller = new $class();
                $controller->$action();


                return $controller;
            }
        }
            return false;
        }
    }

    public static function init()
    {
        require Constants::rootPath()->join("/../config/routes.php");
        Router::getInstance()->dispatch();
    }
}
