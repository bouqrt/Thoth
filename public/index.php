<?php
session_start();

require_once '../app/core/Router.php';
require_once '../app/controllers/StudentController.php';


// URI complète
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Supprimer /thoth/public du chemin
$basePath = '/thoth/public';
$uri = str_replace($basePath, '', $uri);

// Si vide → /
$uri = $uri === '' ? '/' : $uri;

$router = new Router();

// Routes
$router->get('/', 'StudentController@home');
$router->get('/login', 'StudentController@login');
$router->get('/register', 'StudentController@register');
$router->get('/student/dashboard', 'StudentController@dashboard');
$router->get('/logout', 'StudentController@logout');

$router->dispatch($uri);





// use app\core \router
//     include _DIR__. '/../vendor/autoload.php';

//     $router = new router();
//     $router->route("/user"function($test)) -->

