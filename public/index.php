<?php

require_once '../app/core/Router.php';
require_once '../app/controllers/StudentController.php';

// Récupérer l'URL demandée
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Initialiser le router
$router = new Router();

// Définition des routes
$router->get('/', 'StudentController@home');
$router->get('/login', 'StudentController@login');
$router->get('/register', 'StudentController@register');
$router->get('/student/dashboard', 'StudentController@dashboard');

// Lancer le routage
$router->dispatch($uri);







// use app\core \router
//     include _DIR__. '/../vendor/autoload.php';

//     $router = new router();
//     $router->route("/user"function($test)) -->

