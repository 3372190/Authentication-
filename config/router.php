<?php
//Router set to home page!!!  localhost/Authentication-/public/
$app->get('/', ['\App\Controllers\HomeController','index'])->setName('home');
