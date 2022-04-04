<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('register', 'DefaultController');
Routing::get('dashboard', 'DefaultController');
Routing::get('logout', 'DashboardController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('dashboard', 'DefaultController');

Routing::post('grafittiForm', 'GrafittiController');
Routing::post('addGrafitti', 'GrafittiController');
Routing::post('summary', 'GrafittiController');

Routing::run($path);

