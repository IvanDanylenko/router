<?php

use IvanDanylenko\Router\RouterFactory;

include 'vendor/autoload.php';

$factory = new RouterFactory(['controllersNamespace' => 'IvanDanylenko\\Router']);
$router = $factory->createComponent();
$callable = $router->route('/test/hello');
$callable();
