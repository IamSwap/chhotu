<?php

use Illuminate\Http\Request;

$router->get('/', function(Request $request) {
});

$router->get('/users', 'App\Controllers\UsersController@list');
