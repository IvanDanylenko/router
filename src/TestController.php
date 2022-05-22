<?php

namespace IvanDanylenko\Router;

class TestController
{
    public function hello(string $hi = 'world'): void
    {
        echo 'Hello ' . $hi;
    }
}
