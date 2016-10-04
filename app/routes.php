<?php

//Setting Router for HomeController with Index() Method!!!
$app->get('/', ['\App\Controllers\HomeController', 'index'])->setName('home');


$app->get('/auth/signup',   ['\App\Controllers\Auth\AuthController' , 'getSingUp'])->setName('auth.signup');
$app->post('/auth/signup' , ['\App\Controllers\Auth\AuthController' , 'postSignUp']);



$app->get('/auth/signin', ['\App\Controllers\Auth\AuthController' , 'getSingIn'])->setName('auth.signin');
$app->post('/auth/signin',['\App\Controllers\Auth\AuthController' , 'postSingIn']);


$app->get('/auth/singout', ['\App\Controllers\Auth\AuthController' , 'getSignOut'])->setName('auth.singout');
