<?php

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\Router;

require './vendor/autoload.php';
require './database.php';

// Initilise Container
$container = new Container();

// Create a request from server variables and bind it to container.
$request = Request::capture();
$container->instance('Illuminate\Http\Request', $request);

// Create Event Dispatcher
$events = new Dispatcher($container);

// Create Router
$router = new Router($events, $container);

require_once './routes.php';

// send response
$response = $router->dispatch($request);
$response->send();
