<?php

use Lbm\Mvc\FrontController;
use Lbm\Mvc\CommandResolver;
use Lbm\Mvc\HttpResponse;
use Lbm\Mvc\HttpRequest;
use Lbm\Mvc\Filters\HttpAuthFilter;
use Lbm\Mvc\Registry;
use Lbm\Mvc\Event;
use Lbm\Mvc\Psr4Autoloader;

require_once __DIR__ . '/app/Config.php';

require_once 'Autoloader.php';

$loader = new Psr4Autoloader();
$loader->register();
$loader->addNamespace('Lbm\Mvc', __DIR__.'/app');

$request = new HttpRequest();
$resolver = new CommandResolver('controllers', 'Home');
$controller = new FrontController($resolver);

$response = new HttpResponse();

$controller->handleRequest($request, $response);
