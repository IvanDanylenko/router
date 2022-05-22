<?php

include 'vendor/autoload.php';

use IvanDanylenko\Router\RouterFactory;

$factory = new RouterFactory(['controllersNamespace' => 'IvanDanylenko\\Router']);
$router = $factory->createComponent();
$callable = $router->route('/test/hello');
$callable();
