<?php

namespace App;

use DI\ContainerBuilder;

class App extends \DI\Bridge\Slim\App
{
  protected function configureContainer(ContainerBuilder $builder)
  {
    $builder->addDefinitions([
      'settings.displayErrorDetails' => true,
    ]);


    $builder->addDefinitions(__DIR__ . '/container.php');
  }
}
