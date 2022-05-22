<?php

namespace IvanDanylenko\Router;

use Aigletter\Contracts\ComponentFactory;
use Aigletter\Contracts\Routing\RouteInterface;

/**
 * Factory to create routes
 */
class RouterFactory extends ComponentFactory
{
    public const KEY_CONTROLLERS_NAMESPACE = 'controllersNamespace';

    /**
     * @return RouteInterface
     */
    protected function createConcreteComponent(): RouteInterface
    {
        return new Router($this->arguments[self::KEY_CONTROLLERS_NAMESPACE]);
    }
}
