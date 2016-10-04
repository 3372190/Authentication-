<?php
/**
 *  Slim Application Start-up Here!!
 *
 */
use App\App as Slim;
use Slim\Views\Twig as View;
use App\Middleware\ValidationErrorsMiddleware;
use App\Middleware\OldInputMiddleware;
use Respect\Validation\Validator as v;
use App\Middleware\CsrfViewMiddleware;
use Slim\Csrf\Guard;

session_start();
require_once __DIR__ . '/../vendor/autoload.php';

//Initialise Slim Framework by Overwritted App Class!!
$app = new Slim;
$container = $app->getContainer();


//Instantiate Eloquent Capsule!! Database Connection set up
require_once __DIR__ . '/db.php';

$app->add(new ValidationErrorsMiddleware($container->get(View::class)));
$app->add(new OldInputMiddleware($container->get(View::class)));
$app->add(new CsrfViewMiddleware($container->get(View::class), $container->get(Guard::class)));
$app->add($container->get(Guard::class));


v::with('App\\Validation\\Rules\\');

//Invoke routes with Controller!!
require __DIR__ . '/../app/routes.php';
