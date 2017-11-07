<?php
namespace Core;

class Router
{
    private static $routes = [];

    public static function add($module,$route, $controller, $method)
    {
        static::$routes[$route] = ["module" => $module, "controller" => $controller, "method" => $method];
    }

    public static function getAction($route)
    {
        if(array_key_exists($route, static::$routes))
        {
            return static::$routes[$route];
        }else{
            throw new \Exception("The route $route was not found");
        }
    }

}