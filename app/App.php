<?php

namespace App;

/**
 * Override DI\Bridge\Slim\App
 * - Override to - configure self build container Method!!
 */

use DI\ContainerBuilder;
use DI\Bridge\Slim\App as Di_Bridge;

class App extends Di_Bridge
{
   protected function configureContainer(ContainerBuilder $builder)
   {
      $builder->addDefinitions([
        'settings.displayErrorDetails' => true,
      ]);

      $builder->addDefinitions(__DIR__ . '/container.php');
   }
}
