<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Interop\Container\ContainerInterface;

return [

    Twig::class => function(ContainerInterface $c){
        $view = new Twig(
            $c->get('router'),
            $c->get('request')->getUri()
        );

        $view->addExtension(new TwigExtension(__DIR__ .'/../resources/views', [
            'cache' => false,
        ]));

        return $view;
    },


];
