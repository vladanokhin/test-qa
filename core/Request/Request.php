<?php

namespace Core\Request;

class Request
{
    public string $method;
    public string $uri;

    public function __construct()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * Get data from request
     * @return array
     */
    public function data(): array
    {
        return match ($this->method){
            'GET', 'HEAD' => $_GET,
            'POST' => $_POST
        };
    }

    /**
     * Get data from request by key
     * or return default value
     * @param string $key
     * @param mixed|null $default
     * @return mixed
     */
    public function get(string $key, mixed $default=null): mixed
    {
        $data = $this->data();
        if(array_key_exists($key, $data))
            return $data[$key];

        return $default;
    }
}
