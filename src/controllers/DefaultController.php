<?php

require_once 'AppController.php';

class DefaultController extends AppController
{
    public function index(){
        $this->render('welcome');
    }

    public function login(){
        if ($_COOKIE['loggedUser']) {
            $this->render('dashboard');
        }
        return $this->render('login', ['messages' => ['Wykonano funkcję login z Default Controller!']]);
    }

    public function register(){
        $this->render('register');
    }

    public function welcome(){
        $this->render('welcome');
    }

    public function dashboard(){
        if (!$_COOKIE['loggedUser']) {
            return $this->render('login', ['messages' => ['Aby uzyskać dostęp musisz się zalogować!']]);
        } else {
            $this->render('dashboard');
        }
    }
}