<?php

namespace Paw\Core;
use Paw\Core\Exceptions\RouteNotFoundException;
use Paw\Core\Request;
use Exception;
class Router
{
    private array $routes = [
        "GET" => [],
        "POST" => [],
    ];

    private string $notFound = 'not_found';

    private string $internalError = 'internal_error';

    public function __construct($notFoundRoute, $internalErrorRoute)
    {
        $this->get($this->notFound, $notFoundRoute);
        $this->get($this->internalError, $internalErrorRoute);
    }

    public function loadRoutes($path, $action, $method = "GET")
    {
        $this->routes[$method][$path] = $action;
    }


    public function get($path, $accion)
    {
        $this->loadRoutes($path, $accion, "GET");
    }

    public function post($path, $accion)
    {
        $this->loadRoutes($path, $accion, "POST");
    }

    public function exists($path, $method)
    {
        return array_key_exists($path, $this->routes[$method]);
    }


    public function getController($path, $http_method)
    {
        if(!$this->exists($path, $http_method)) {
            throw new RouteNotFoundException("No existe ruta para este Path");    
        } 
        return explode('@', $this->routes[$http_method][$path]);
    }

    public function call($controller, $method)
    {
        $controller_name = "Paw\\App\\Controllers\\{$controller}";
        $objController = new $controller_name;
        $objController->$method();
    }

    public function direct(Request $request) 
    {
        try{
            list($path, $http_method) = $request -> route();
            list($controller, $method) = $this->getController($path, $http_method);
            $this->call($controller, $method);
        } catch(RouteNotFoundException $e){
            list($controller, $method) = $this->getController($this->notFound, "GET");       
            $this->call($controller, $method);
        } catch(Exception $e){
            list($controller, $method) = $this->getController($this->internalError, "GET");       
            $this->call($controller, $method);
        }
    }
}