<?php

/**
 *  Authentication Website Application start here!!!
 */
session_start();
ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$app = new \App\App;
$container = $app->getContainer();

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/router.php';
