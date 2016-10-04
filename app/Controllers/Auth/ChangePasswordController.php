<?php

namespace App\Controllers\Auth;

use Slim\Router;
use App\Models\User;
use Slim\Views\Twig;
use App\Authenticate\Auth;
use App\Validation\Validator;
use Slim\Flash\Messages as Flash;
use Respect\Validation\Validator as v;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ChangePasswordController
{
    public function getChangePassword(Twig $view, Response $response, Request $request)
    {
        return $view->render($response, 'auth/password/changepassword.twig');
    }

    public function postChangePassword(Validator $validator, Flash $flash, Auth $auth, Response $response, Request $request, Router $router)
    {
        $validation = $validator->validate($request, [
            'password_old' => v::noWhitespace()->notEmpty()->MatchPassword($auth->loggedInUser()->password),
            'password'     => v::noWhitespace()->notEmpty(),
        ]);

        if($validation->failed()){
          return $response->withRedirect($router->pathFor('auth.password.change'));
        }

        $auth->loggedInUser()->updatePassword($request->getParam('password'));

        $flash->addMessage('changepassword','Password changed successfully');
        return $response->withRedirect($router->pathFor('home'));
    }
}
