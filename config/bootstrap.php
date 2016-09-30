<?php

/**
 *  Slim Application Start-up Here!!
 *
 */

session_start();
require_once __DIR__ . '../vendor/autoload.php';

$slim = new \Slim\App([
  'settings' => [
    'displayErrorDetails' => true,
  ]
]);

require_once __DIR__ . '/routes.php';
