<?php

namespace App\Middleware;

use Slim\Router;
use Slim\Views\Twig;
use App\Authenticate\Auth;
use Slim\Flash\Messages as Flash;

class AuthMiddleware extends Middleware
{
    protected $router;
    protected $auth;
    protected $flash;
    protected $view;

    public function __construct(Router $router, Auth $auth, Flash $flash, Twig $view)
    {
        $this->router = $router;
        $this->auth   = $auth;
        $this->flash  = $flash;
        $this->view   = $view;
    }


    public function __invoke($request, $response, $next)
    {
        if(!$this->auth->check()){
            $this->flash->addMessage('signup','Please sing-up here');
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }
        
        $response = $next($request, $response);
        return $response;
    }
}
