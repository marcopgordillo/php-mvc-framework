<?php

namespace App\controllers;

use App\core\Application;
use App\core\Request;
use App\core\Response;
use App\models\ContactForm;
use App\core\Controller;

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