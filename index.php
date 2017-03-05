<?php

use Lbm\Mvc\Core\FrontController;
use Lbm\Mvc\Core\CommandResolver;
use Lbm\Mvc\Core\HttpResponse;
use Lbm\Mvc\Core\HttpRequest;
use Lbm\Mvc\Filters\HttpAuthFilter;
use Lbm\Mvc\Core\Registry;
use Lbm\Mvc\Core\Event;
use Lbm\Mvc\Psr4Autoloader;

require_once __DIR__ . '/app/Core/Config.php';

require_once 'Autoloader.php';

$loader = new Psr4Autoloader();
$loader->register();
$loader->addNamespace('Lbm\Mvc', __DIR__.'/app');

$request = new HttpRequest();
$resolver = new CommandResolver('controllers', 'Home');
$controller = new FrontController($resolver);

$response = new HttpResponse();

$controller->handleRequest($request, $response);
