<?php


namespace App\Controllers\Auth;


use Slim\Router;
use Slim\Views\Twig as View;
use App\Models\User;
use App\Authenticate\Auth;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Validation\Contracts\ValidatorInterface;
use Respect\Validation\Validator as v;
use Slim\Flash\Messages as Flash;

class AuthController
{
    protected $view;
    protected $router;
    protected $validator;

  public function __construct(View $view, Router $router, ValidatorInterface $validator)
  {
      $this->view   = $view;
      $this->router = $router;
      $this->validator = $validator;
  }

  public function getSignOut(Auth $auth, Response $response, Request $request)
  {
      $auth->logout();
      return $response->withRedirect($this->router->pathFor('home'));
  }

  public function getSingUp(Response $response, Request $request)
  {
      return $this->view->render($response, 'auth/signup.twig');
  }

  public function getSingIn(Response $response, Request $request)
  {
    return $this->view->render($response, 'auth/signin.twig');
  }

  public function postSingIn(Flash $flash, Auth $auth, Response $response, Request $request)
  {
    
      $auth = $auth->attempt(
          $request->getParam('email'),
          $request->getParam('password')
      );

      if(!$auth){
          $flash->addMessage('fail','Incorrect Email or Password');
          return $response->withRedirect($this->router->pathFor('auth.signin'));
      }

      return $response->withRedirect($this->router->pathFor('home'));
  }

  public function postSignUp(Flash $flash, Auth $auth, Request $request, Response $response)
  {
      $validation    = $this->validator->validate($request, [
          'email'    => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
          'username' => v::notEmpty()->alpha(),
          'password' => v::noWhitespace()->notEmpty(),
      ]);

      if ($validation->failed()) {
          return $response->withRedirect($this->router->pathFor('auth.signup'));
      }

      $user = User::create([
          'email'    => $request->getParam('email'),
          'username' => $request->getParam('username'),
          'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
      ]);

      $flash->addMessage('success', 'Account Created!');

      $login = $auth->attemp($user->email, $request->getParam('password'));

      return $response->withRedirect($this->router->pathFor('home'));
  }
}
