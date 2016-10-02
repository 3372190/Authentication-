<?php

/**
 *  Overwrite the php-di\Slim-bridge App class!!
 */
namespace App;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
  protected function configureContainer(ContainerBuilder $builder)
  {
    $builder->addDefinitions([
      'settings.displayErrorDetails' => true,
    ]);

    $builder->addDefinitions(__DIR__ . '/Container.php');
  }
}
