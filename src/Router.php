<?php

namespace IvanDanylenko\Router;

use Aigletter\Contracts\Routing\RouteInterface;

class Router implements RouteInterface
{
    protected $customRoutes = [];

    protected $controllersNamespace;

    public function __construct(string $controllersNamespace)
    {
        $this->controllersNamespace = $controllersNamespace;
    }

    /**
     * @example
     * $router->route(/page/view);
     */
    public function route(string $uri): callable
    {
        if (isset($this->customRoutes[$uri])) {
            // Return callable associated with this route
            return $this->customRoutes[$uri];
        }

        // Remove first slash
        $uri = trim($uri, '/');
        // Split url into segments
        $segments = explode('/', $uri);
        $controller = $this->controllersNamespace . '\\' . ucfirst($segments[0]);
        $method = $segments[1];
        if (class_exists($controller)) {
            $instance = new $controller();
            return [$instance, $method];
        } else {
            throw new \Exception('Controller ' . $controller . ' not found');
        }
    }

    public function addRoute(string $uri, callable $callable)
    {
        $this->customRoutes[$uri] = $callable;
    }
}
