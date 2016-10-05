<?php

use function DI\get;
use Slim\Views\Twig as View;
use Slim\Views\TwigExtension;
use App\Validation\Contracts\ValidatorInterface;
use App\Validation\Validator;
use App\Models\User;
use Interop\Container\ContainerInterface;
use Slim\Csrf\Guard;
use App\Authenticate\Auth;
use Slim\Flash\Messages as Flash;

return [

  Auth::class => function (ContainerInterface $c){
    return new Auth;
  },

  Flash::class => function (ContainerInterface $c){
    return new Flash;
  },
  //'router' => get(Slim\Router::class),

  ValidatorInterface::class => function (ContainerInterface $c) {
      return new Validator;
  },
  /**
   * Instantiating Twig & TwigExtension Objects!!
   *   with Slim Container callbacks function!!
   */
  View::class => function (ContainerInterface $c){
    $view = new View(__DIR__ .'/../resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new TwigExtension(
      $c->get('router'),
      $c->get('request')->getUri()
    ));

    $view->getEnvironment()->addGlobal('auth', $c->get(Auth::class));
    $view->getEnvironment()->addGlobal('flash', $c->get(Flash::class));

    return $view;
  },

  User::class =>function (ContainerInterface $c){
      return new User;
  },

  Guard::class => function (ContainerInterface $c) {
    return new Guard;
  },

];
