<?php

namespace Core\Entities;

class Config
{
    protected $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }
}