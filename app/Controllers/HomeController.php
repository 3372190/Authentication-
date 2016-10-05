<?php

namespace App\Controllers;

/**
 * Home Controller !!! to render index.twig !!!
 */
use Slim\Views\Twig;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class HomeController
{
  public function index(Request $request, Response $response, Twig $view)
  {
      return $view->render($response, 'index.twig');
  }
}
