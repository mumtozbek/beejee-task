<?php

namespace Core\Entities;

class Session
{
    public function __construct()
    {
        $session = session_start();
    }
}