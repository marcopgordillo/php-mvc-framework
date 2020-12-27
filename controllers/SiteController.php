<?php

namespace App\controllers;

use marcopgordillo\phpmvc\Application;
use marcopgordillo\phpmvc\Request;
use marcopgordillo\phpmvc\Response;
use App\models\ContactForm;
use marcopgordillo\phpmvc\Controller;

class SiteController extends Controller

{
    public function home()
    {
        return $this->render('home', [
            'name'      => "TheCodeHolic",
        ]);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();

        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for contacting us.');
                return $response->redirect('/contact');
            }
        }

        return $this->render('contact', [
            'model' => $contact,
        ]);
    }
}