<?php 


<?php

class Router
{
    private array $routes = [];

    public function get(string $path, string $action): void
    {
        $this->routes[$path] = $action;
    }

    public function dispatch(string $uri): void
    {
        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            echo "404 - Page non trouvée";
            return;
        }

        // Séparer Controller et méthode
        [$controllerName, $method] = explode('@', $this->routes[$uri]);

        $controller = new $controllerName();

        $controller->$method();
    }
}

























// namespace App\core;
// class Router {

//     private $route =[];

//     public function route($path, $callback){
//         $this->route[$path]= $callback;
//     }

//     public function dispatch(){
//         $url =$_SERVER['REQUEST_URL'];
        
//         //echo "<pre>";
//         //var_dump ($_SERVER['REQUEST_URL']);
//         //echo"</pre>"

//     };

// }