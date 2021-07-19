<?php

namespace App\Controllers;

use Core\App;

class Auth
{
    public function index()
    {
        App::instance()->get('response')->setContent('Hooray, it works!');
    }
}