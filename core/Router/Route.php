<?php

namespace Core\Router;

use Core\Http\Request;
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

    public function getName(): string
    {
        return $this->name;
    }

    public function name(string $newName): void
    {
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

    public function match(Request $request): bool
    {
        return $this->method === $request->getMethod() && $this->uri === $request->getUri();
    }

    /*

    Static Methods

    */
    /**
     * @param string $uri
     * @param mixed[] $action
     * @return Route
     */

    public static function get(string $uri, $action): Route
    {
        return Router::getInstance()->addRoute(new Route('GET', $uri, $action[0], $action[1]));
    }

    /**
     * @param string  $uri
     * @param mixed[] $action
     * @return Route
     */

    public static function post(string $uri, $action): Route
    {
        return Router::getInstance()->addRoute(new Route('POST', $uri, $action[0], $action[1]));
    }
}
