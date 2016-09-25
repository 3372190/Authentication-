<?php


return [

    'app' => [
      'url' => 'http://localhost',
      'hash'=> [
          'algo' => PASSWORD_BCRYPT,
          'cost' => 10
      ]
    ],

    'db' => [
      'driver'    => 'mysql',
      'host'      => '127.0.0.1',
      'name'      => 'authenticate',
      'user'      => 'root',
      'pass'      => '',
      'charset'   => 'utf8',
      'collation' => 'utf8_unicode_ci',
      'prefix'    => '',
    ],

    'auth' => [
      'session' =>'user_id',
      'remember' => 'user_r',
    ],

    'mail' => [
      'smtp_auth' => true,
      'smtp_secure' => 'tls',
      'host' => 'smtp.gmai.com',
      'username' => 'wyteng14@gmail.com',
      'password' => 'Iphone9377',
      'port' => 587,
      'html' => true,
    ],

    'twig' => [
      'debug' => true,
    ],

    'csrf' => [
      'session' => 'csrf_token'
    ]

];
