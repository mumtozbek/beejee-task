<?php

namespace Core;

class Fallback
{
    public function errorNotFound()
    {
        echo 'Oops, the route not found.';
    }
}