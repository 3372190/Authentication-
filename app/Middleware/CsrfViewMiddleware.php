<?php

namespace App\Middleware;

use Slim\Views\Twig as View;
use Slim\Csrf\Guard;


class CsrfViewMiddleware
{

  protected $view;
  protected $csrf;

  public function __construct(View $view, Guard $csrf)
  {
      $this->view = $view;
      $this->csrf = $csrf;
  }

  public function __invoke($request, $response, $next)
  {
      $nameKey  = $this->csrf->getTokenNameKey();
      $valueKey = $this->csrf->getTokenValueKey();


    $this->view->getEnvironment()->addGlobal('csrf', [
        'field' => '
        <input type ="hidden" name =" '.$nameKey.' " value =" '.$request->getAttribute($nameKey).' ">
        <input type ="hidden" name =" '.$valueKey.' " value =" '.$request->getAttribute($valueKey).' ">
        ',
    ]);

    $response = $next($request, $response);
    return $response;
  }
}
