<?php

/**
 * Setting Router (url) to render->twig with Controllers Methods!!
 */

//Setting Router for HomeController with Index() Method!!!
$app->get('/', ['\App\Controllers\HomeController', 'index'])->setName('home');

$app->get('/auth/signup', ['\App\Controllers\Auth\AuthController' , 'getSingUp'])->setName('auth.signup');
$app->post('/auth/signup' , ['\App\Controllers\Auth\AuthController' , 'postSignUp']);
