<?php

namespace Core;

abstract class App
{
    private static $instance;

    private $data = [];

    public static function init(...$args)
    {
        if (is_null(self::$instance)) {
            self::$instance = new static(...$args);
        }

        return self::$instance;
    }

    public static function instance()
    {
        if (is_null(self::$instance)) {
            throw new \Exception('Application is not initialized yet.');
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

    abstract public function run();
}