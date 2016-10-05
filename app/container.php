<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;

return [

    Twig::class => function(ContainerInterface $c){
        $view = new Twig(__DIR__ .'/../resources/views', [
            'cache' => false,
        ]);

        $view->addExtension(new TwigExtension(
          $c->get('router'),
          $c->get('request')->getUri()
        ));

        return $view;
    },


];
