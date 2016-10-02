<?php
/**
 * Initialise Eloquent Capsule and Connecting to Database!!
 * Database is now Set Globally!!
 */
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
  'driver'     => 'mysql',
  'host'       => 'localhost',
  'database'   => 'authenticate',
  'username'   => 'root',
  'password'   => '',
  'charset'    => 'utf8',
  'collation' => 'utf8_unicode_ci',
  'prefix'     => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
