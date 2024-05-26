<?php

namespace Core\Router;

use Core\Router\Router;

class Route
{
    public function __construct(
        private string $method,
        private string $uri,
        private string $controllerName,
        private string $actionName
    ) {
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function match(string $method, string $uri)
    {
        return $this->method === $method && $this->uri === $uri;
    }

    /*

    Static Methods

    */




    public static function get(string $uri, $action): void
    {
         Router::getInstance()->addRoute(new Route('GET', $uri, $action[0], $action[1]));
    }
}
