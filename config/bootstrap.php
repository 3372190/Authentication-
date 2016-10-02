<?php
/**
 *  Slim Application Start-up Here!!
 *
 */
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

//Initialise Slim Framework by Overwritted App Class!!
$app = new App\App;

//Instantiate Eloquent Capsule!! Database Connection set up
require_once __DIR__ . '/db.php';

//Invoke routes with Controller!!
require __DIR__ . '/../app/routes.php';
