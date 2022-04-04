<?php

require_once 'AppController.php';

class DashboardController extends AppController{

    public function logout(){
        if (!$this->isPost()) {
            return $this->render('dashboard');
        }

        setcookie("loggedUser",'', time() - 1, '/');
        return $this->render('login');
    }

    public function addGrafitti(){
        return $this->render('addGrafitti');
    }
}