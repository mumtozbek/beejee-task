<?php

namespace App;

use Core\App;
use Core\Entities\Database;
use Core\Entities\Request;
use Core\Entities\Response;
use Core\Entities\Router;
use Core\Entities\Session;

class Instance extends App
{
    protected function __construct()
    {
        $this->set('router', new Router(require __DIR__ . '/routes.php'));

        $this->set('database', new Database());

        $this->set('request', new Request());

        $this->set('response', new Response());

        $this->set('session', new Session());
    }

    public function run()
    {
        $route = $this->get('request')->get('route', 'auth');

        $this->get('router')->run($route);
    }
}