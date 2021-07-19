<?php

namespace Core\Entities;

class Response
{
    private $content;
    private $headers = [];

    public function addHeader($header)
    {
        $this->headers[] = $header;
    }

    public function addHeaders($headers)
    {
        $this->headers = array_merge($this->headers, $headers);
    }

    public function redirect($url, $status = 302)
    {
        header('Location: ' . str_replace(['&amp;', "\n", "\r"], ['&', '', ''], $url), true, $status);
        exit();
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function render()
    {
        if (!headers_sent()) {
            foreach ($this->headers as $header) {
                header($header, true);
            }
        }

        if (is_array($this->content)) {
            json_encode($this->content);
            header('Content-type', 'text/json');
        } elseif (is_string($this->content)) {
            echo $this->content;
        } else {
            var_dump($this->content);
        }
    }
}
