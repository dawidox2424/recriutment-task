<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index()
    {
        $this->render('welcome');
    }

    public function login(){
        $this->render('login');
    }

    public function register(){
        $this->render('register');
    }

    public function welcome()
    {
        $this->render('welcome');
    }
}