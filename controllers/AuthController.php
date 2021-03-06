<?php

namespace App\controllers;

use marcopgordillo\phpmvc\Request;
use marcopgordillo\phpmvc\Response;
use marcopgordillo\phpmvc\Controller;
use marcopgordillo\phpmvc\Application;
use App\models\User;
use App\models\LoginForm;
use marcopgordillo\phpmvc\middlewares\AuthMiddleware;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginForm = new LoginForm();

        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                return;
            }
        }

        $this->setLayout('auth');
        return $this->render('auth/login', [
            'model' =>  $loginForm,
        ]);
    }

    public function register(Request $request)
    {
        $errors = [];
        $user = new User();

        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
            }
        }

        $this->setLayout('auth');
        return $this->render('auth/register', [
            'model'     => $user,
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        return $this->render('auth/profile');
    }
}