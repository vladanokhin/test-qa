<?php

namespace Core\App;

use Core\Request\Request;
use Core\Router\Route;

/**
 * Class for the connection between
 * the router and the controller
 */
class Web
{
    private App $app;
    private Request $request;
    private array $routers;

    public function __construct(App $app, Request $request)
    {
        $this->app = $app;
        $this->request = $request;
        $this->routers = Route::getAll();
        $this->findController();
    }

    private function findController()
    {
        foreach ($this->routers as $uri => $data) {
            if($this->isContainsUri($uri, $data)) {
                $class = $data['actions'][0];
                $method = $data['actions'][1];
                $this->callController($class, $method);
            }
        }
    }

    /**
     * Check if the router from the list
     * matches the client's current router
     * @param string $uri
     * @param array $data
     * @return bool
     */
    private function isContainsUri(string $uri, array $data): bool
    {
        return $uri === $this->request->uri &&
               in_array($this->request->method, $data['methods']);
    }

    private function callController($class, string $method)
    {
        $controller = new $class();
        $controller->$method($this->request);
    }

}
