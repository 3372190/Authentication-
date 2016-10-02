<?php


namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class AuthController extends Controller
{
  public function getSingUp(Response $response, Request $request)
  {
      return $this->view->render($response, 'auth/signup.twig');
  }

  public function postSignUp(Response $response, Request $request, User $user)
  {
    $users = $user->create([
      'email'     => $request->getParam('email'),
      'username' => $request->getParam('username'),
      'password' => password_hash($request->getParam('password'), PASSWORD_BCRYPT , ['cost' => 10])
    ]);

    return $response->withRedirect($this->router->pathFor('home'));
  }
}
