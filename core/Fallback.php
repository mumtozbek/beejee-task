<?php

namespace Core;

class Fallback
{
    public function errorNotFound()
    {
        App::instance()->get('response')->setContent('Oops, the route not found.');
    }
}