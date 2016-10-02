<?php

namespace App\Controllers;

use Slim\Router;
use Slim\Views\Twig as View;

class Controller
{
  protected $view;
  protected $router;

  public function __construct(View $view, Router $router)
  {
    $this->view   = $view;
    $this->router = $router;
  }
}
