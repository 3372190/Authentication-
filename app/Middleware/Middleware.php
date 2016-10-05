<?php

namespace App\Middleware;

use Slim\Views\Twig as View;

class Middleware
{
    protected $view;

    public function __construct(View $view)
    {
        $this->view = $view;
    }
}
