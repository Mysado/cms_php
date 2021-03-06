<?php
namespace App\Core;
class Router
{
    protected $routes = [
        'GET'=>[],
        'POST'=>[],
    ];
    public function define($routes)
    {
        $this->routes = $routes;
    }

    public static function load($file)
    {
        $router = new static;
        require $file;
        return $router;
    }
    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }
    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }
    public function direct($uri, $requestType)
    {

        if (!array_key_exists($uri, $this->routes[$requestType])) {
            throw new \Exception();
        }
        try {
            return $this->callAction(
                ...explode('@', $this->routes[$requestType][$uri])
            );
        } catch (\Exception $e) {
            echo '404 page not found';
            echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
        }
        
    }

    protected function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;
        if (!method_exists($controller, $action)) {
            throw new \Exception();
        }
        return $controller->$action();
    }
}