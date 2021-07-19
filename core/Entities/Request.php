<?php

namespace Core\Entities;

class Request
{
    private $get = [];
    private $post = [];
    private $cookie = [];
    private $files = [];
    private $server = [];

    public function __construct()
    {
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        $this->request = $this->clean($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
        $this->server = $this->clean($_SERVER);
    }

    public function clean(&$data)
    {
        $result = [];

        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $result[$this->clean($key)] = $this->clean($value);
            }

            $data = [];
        } else {
            $result = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }

        return $result;
    }

    public function get($key, $default = null)
    {
        return $this->get[$key] ?? $default;
    }

    public function post($key, $default = null)
    {
        return $this->post[$key] ?? $default;
    }

    public function cookie($key, $default = null)
    {
        return $this->cookie[$key] ?? $default;
    }

    public function files($key, $default = null)
    {
        return $this->files[$key] ?? $default;
    }

    public function server($key, $default = null)
    {
        return $this->server[$key] ?? $default;
    }
}