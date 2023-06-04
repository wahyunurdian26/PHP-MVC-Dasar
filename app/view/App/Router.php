<?php

namespace WahyuNurdian\Belajar\PHP\MVC\App;

class Router
{
    private static array $routes = [];
    public static function add(string $method, string $path, string $controller, string $function):void
{

    self::$routes[] = [
        'method' => $method,
        'path' => $path,
        'controller' => $controller,
        'function' => $function
    ];
}
public static function run()
{
$path = "/";
if (isset($_SERVER['PATH_INFO'])) $path = $_SERVER['PATH_INFO'];
$method = $_SERVER['REQUEST_METHOD'];

foreach (self::$routes as $route){
    if ($path == $route['path'] && $method == $route['method']){
        echo "CONTROLLER : " . $route['controller'] . ', Function :' . $route['function'];
        return;
    }
}
http_response_code(404);
echo "CONTROLLER NOT FOUND";
}
   


    }