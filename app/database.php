<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'    => $app->config->get('db.driver'),
  'host'      => $app->config->get('db.host'),
  'dbname'    => $app->config->get('db.name'),
  'user'      => $app->config->get('db.user'),
  'pass'      => $app->config->get('db.pass'),
  'charset'   => $app->config->get('db.charset'),
  'collation' => $app->config->get('db.collation'),
  'prefix'    => $app->config->get('db.prefix'),
]);

$capsule->bootEloquent();
