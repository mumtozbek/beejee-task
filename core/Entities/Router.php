<?php

namespace Core\Entities;

use Core\App;
use Core\Fallback;

class Router
{
    private $routes = [];

    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    public function run($route)
    {
        if (array_key_exists($route, $this->routes)) {
            [$class, $method] = $this->routes[$route];

            $callback = [new $class, $method];
        } else {
            $callback = [new Fallback, 'errorNotFound'];
        }

        call_user_func($callback);

        App::instance()->get('response')->render();
    }
}