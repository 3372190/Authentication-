<?php

  use Illuminate\Database\Capsule\Manager as Capsule;

  $capsule = new Capsule;

  $capsule->addConnection([
    'driver'    => 'mysql',
    'localhost' => '127.0.0.1',
    'database'  => 'authenticate',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
  ]);

  $capsule->setAsGlobal();
  $capsule->bootEloquent();
