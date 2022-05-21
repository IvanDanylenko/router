<?php

namespace IvanDanylenko\Router;

use Aigletter\Contracts\ComponentFactory;
use Aigletter\Contracts\Routing\RouteInterface;

class RouterFactory extends ComponentFactory
{
    protected function createConcreteComponent(): RouteInterface
    {
        return new Router($this->arguments['controllersNamespace']);
    }
}
