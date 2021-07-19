<?php

namespace Core\Entities;

class Database
{
    private $driver;

    public function __construct($hostname, $username, $password, $database, $port = '3306')
    {
        $this->driver = new \mysqli($hostname, $username, $password, $database, $port);

        if ($this->driver->connect_error) {
            throw new \Exception('Error: ' . $this->driver->error . '<br />Error No: ' . $this->driver->errno);
        }

        $this->driver->set_charset("utf8");
        $this->driver->query("SET SQL_MODE = ''");
    }

    public function escape($value) {
        return $this->driver->real_escape_string($value);
    }

    public function __destruct() {
        $this->driver->close();
    }
}