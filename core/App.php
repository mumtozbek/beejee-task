<?php

namespace Core;

abstract class App
{
    private static $instance;

    private $path = '';
    private $data = [];

    private function __construct(string $path)
    {
        $this->path = $path;
    }

    public static function instance(string $path)
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($path);
        }

        return self::$instance;
    }

    protected function set($code, $entity)
    {
        $this->data[$code] = $entity;
    }

    public function get(string $code)
    {
        if (!isset($this->data[$code])) {
            throw new \Exception("Could not resolve: '$code'");
        }

        return $this->data[$code];
    }

    public function getPath()
    {
        return $this->path;
    }
}