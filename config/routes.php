<?php

use Slim\Router;
use Slim\Views\Twig;
use App\Authenticate\Auth;
use Slim\Flash\Messages as Flash;
use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

//Setting Router for HomeController with Index() Method!!!
//
//
$app->get('/', ['\App\Controllers\HomeController', 'index'])->setName('home');

$app->group('', function(){

  $this->get('/auth/signup',   ['\App\Controllers\Auth\AuthController' , 'getSingUp'])->setName('auth.signup');
  $this->post('/auth/signup' , ['\App\Controllers\Auth\AuthController' , 'postSignUp']);

  $this->get('/auth/signin', ['\App\Controllers\Auth\AuthController' , 'getSingIn'])->setName('auth.signin');
  $this->post('/auth/signin',['\App\Controllers\Auth\AuthController' , 'postSingIn']);

})->add(new GuestMiddleware(
      $container->get(Router::class),
      $container->get(Auth::class),
      $container->get(Flash::class),
      $container->get(Twig::class)
));





$app->group('', function () {
  $this->get( '/auth/password/change',['\App\Controllers\Auth\ChangePasswordController','getChangePassword'])->setName('auth.password.change');
  $this->post('/auth/password/change',['\App\Controllers\Auth\ChangePasswordController','postChangePassword']);
  $this->get( '/auth/singout', ['\App\Controllers\Auth\AuthController' , 'getSignOut'])->setName('auth.singout');
})->add(new AuthMiddleware(
      $container->get(Router::class),
      $container->get(Auth::class),
      $container->get(Flash::class),
      $container->get(Twig::class)
));
