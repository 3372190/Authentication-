<?php

//getMethod for Home Page!!
$app->get('/', ['\App\Controllers\HomeController','index'])->setName('home');
