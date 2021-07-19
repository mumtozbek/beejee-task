<?php

namespace App;

use Core\App;
use Core\Entities\Config;
use Core\Entities\Database;
use Core\Entities\Request;
use Core\Entities\Response;
use Core\Entities\Router;

class Instance extends App
{
    protected function __construct()
    {
        $this->set('config', new Config(require __DIR__ . '/config.php'));

        $this->set('router', new Router(require __DIR__ . '/routes.php'));

        $this->set('database', new Database($this->get('config')->get('db.host'), $this->get('config')->get('db.user'), $this->get('config')->get('db.pass'), $this->get('config')->get('db.base')));

        $this->set('request', new Request());

        $this->set('response', new Response());
    }

    public function run()
    {
        $route = $this->get('request')->get('route', $this->get('config')->get('default_route'));

        $this->get('router')->run($route);
    }
}