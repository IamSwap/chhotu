<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'db_name',
    'username' => 'db_user',
    'password' => 'db_password',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

