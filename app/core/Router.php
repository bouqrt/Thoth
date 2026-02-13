<?php

class Router
{
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $uri = str_replace('/thoth/public', '', $uri);
        if ($uri === '') {
            $uri = '/';
        }

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        [$controller, $methodAction] = explode('@', $this->routes[$method][$uri]);

        require_once "../app/controllers/$controller.php";
        $controllerInstance = new $controller();
        $controllerInstance->$methodAction();
    }
}