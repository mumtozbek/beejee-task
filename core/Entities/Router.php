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
        if (App::instance()->get('config')->get('maintenance')) {
            $callback = [new Fallback, 'maintenance'];
        }

        if (empty($callback)) {
            if (array_key_exists($route, $this->routes)) {
                [$class, $method] = $this->routes[$route];

                $callback = [new $class, $method];
            } else {
                $callback = [new Fallback, 'errorNotFound'];
            }
        }

        if (is_callable($callback)) {
            call_user_func($callback);
        }

        App::instance()->get('response')->render();
    }
}