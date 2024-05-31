<?php

namespace Core\Router;

use Core\Router\Router;

class Route
{
    private string $name = "";
    public function __construct(
        private string $method,
        private string $uri,
        private string $controllerName,
        private string $actionName
    ) {
    }

    public function getName():string{
        return $this->name;
    }

    public function name(string $newName):void{
        $this->name = $newName;
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




    public static function get(string $uri, $action): Route
    {
         return Router::getInstance()->addRoute(new Route('GET', $uri, $action[0], $action[1]));
    }
}
