<?php

use Illuminate\Http\Request;

$router->get('/', function(Request $request) {
    return 'Hello World';
});

$router->get('/users', 'App\Controllers\UsersController@list');
