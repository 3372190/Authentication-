<?php
//Router set to home page!!!  localhost/Authentication-/public/
$app->get('/', ['\App\Controllers\HomeController','index'])->setName('home');

//Router to request the SIGN-UP Twig page.
$app->get('/auth/signup', ['\App\Controllers\Authenticate\AuthController','loginGET'])->setName('signup');
//Router to POST SIGN-UP Twig Page.
$app->post('/auth/signup', ['\App\Controllers\Authenticate\AuthController','loginPOST']);
