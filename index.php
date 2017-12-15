<?php

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\UrlGenerator;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/database.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Initilise Container
$container = new Container();

// Create a request from server variables and bind it to container.
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Create Event Dispatcher
$events = new Dispatcher($container);

// Create Router
$router = new Router($events, $container);

require_once './app/routes.php';

// Redirect
$rediect = new Redirector(new UrlGenerator($router->getRoutes(), $request));
$container->instance('Illuminate\Routing\Redirector', $rediect);

// send response
$response = $router->dispatch($request);
$response->send();
