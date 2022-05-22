<?php

namespace IvanDanylenko\Router;

use Aigletter\Contracts\Routing\RouteInterface;

/**
 * Implementation of application router
 * @author Ivan Danylenko
 */
class Router implements RouteInterface
{
    /**
     * Allows to specify custom routes with their own callbacks
     * @var array
     */
    protected $customRoutes = [];

    /**
     * Namespace added to generated automatically pathes to controllers
     * @var string
     */
    protected $controllersNamespace;

    public function __construct(string $controllersNamespace)
    {
        $this->controllersNamespace = $controllersNamespace;
    }

    /**
     * Method that responsible to invoke specific callback on navigation
     * @param string
     * @return callable
     * @throws Exception
     * @example $router->route(/page/view);
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
        $controller = $this->controllersNamespace . '\\' . ucfirst($segments[0]) . 'Controller';
        $method = $segments[1];
        if (class_exists($controller)) {
            $arguments = [];
            $reflection = new \ReflectionMethod($controller, $method);
            foreach ($reflection->getParameters() as $parameter) {
                if (isset($_GET[$parameter->name])) {
                    $arguments[$parameter->name] = $_GET[$parameter->name];
                } else {
                    throw new \Exception('Argument ' . $parameter->name . ' not found');
                }
            }
            $instance = new $controller();
            return function () use ($reflection, $instance, $arguments) {
                $reflection->invokeArgs($instance, $arguments);
            };
        } else {
            throw new \Exception('Controller ' . $controller . ' not found');
        }
    }

    /**
     * Method to add or override route behavior with custom callbacks
     * @param string $uri
     * @param callable $callable
     */

    public function addRoute(string $uri, callable $callable)
    {
        $this->customRoutes[$uri] = $callable;
    }
}
