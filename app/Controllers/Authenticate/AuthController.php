<?php

namespace App\Controllers\Authenticate;

use Slim\Views\Twig;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController
{
  public function registerGET(Response $response, Request $request, Twig $view)
  {
      return $view->render($response, 'Auth/signup.twig');
  }

  public function registerPOST(){}



/**
 * [loginGET description]
 * @return [type] [description]
 */
public function loginGET(){}
public function loginPOST(){}
}
