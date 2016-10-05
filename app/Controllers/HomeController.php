<?php

namespace App\Controllers;

use Slim\Views\Twig as View;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Flash\Messages as Flash;
/**
 *  This is the Controllers function belong to the Home.twig PAGE!!
 */

class HomeController
{
  //Dependency Injection Method, by rendering Twig Object!!
  public function index(Request $request, Response $response, View $view)
    {
          return $view->render($response, 'home.twig');
    }
}
