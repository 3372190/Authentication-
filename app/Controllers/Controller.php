<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

class Controller
{
    // protected $request;
    // protected $response;
    protected $view;


    public function __construct(View $view)
    {
        // $this->request  = $request;
        // $this->response = $response;
        $this->view     = $view;
    }


}
