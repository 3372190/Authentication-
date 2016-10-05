<?php

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$app = new \App\App;
$container = $app->getContainer();

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/routes.php';
