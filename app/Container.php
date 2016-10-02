<?php

use Slim\Router;
use Slim\Views\Twig as View;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;

use App\Controllers\HomeController;
use App\Controllers\Auth\AuthController;



use App\Models\User;


return [
  /**
   * Instantiating Twig & TwigExtension Objects!!
   *   with Slim Container callbacks function!!
   */
  View::class => function (ContainerInterface $c){
    $view = new View(__DIR__ .'/../resources/views', [
        //Only set 'debug' to true in developing STAGE!!
        // To use dump() functionality in Twig Page!!!
        'debug' => true,
        'cache' => false,
    ]);


    $view->addExtension(new TwigExtension(
      $c->get('router'),
      $c->get('request')->getUri()
    ));

    //Instantiate Twig_Environment_Debug to use dump() Function!
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
  },

  HomeController::class =>  function (ContainerInterface $c) {
    return new HomeController(
        $c->get(View::class),
        $c->get(Router::class)
    );
  },

  AuthController::class => function (ContainerInterface $c){
    return new AuthController(
        $c->get(View::class),
        $c->get(Router::class)
    );
  },

  User::class =>function (ContainerInterface $c){
      return new User;
  },

];
