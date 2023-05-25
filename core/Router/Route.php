<?php

namespace Core\Router;


/**
 * Class for register routers
 */
class Route
{
    private static array $routers = [];

    public static function group(string $prefix='/', callable $callback=null): array
    {
        return [];
    }

    /**
     * Register a new GET route with the router
     * @param string $uri
     * @param array $actions
     * @return void
     */
    public static function get(string $uri, array $actions)
    {
        static::addRouter(['GET', 'HEAD'], $uri, $actions);
    }

    /**
     * Register a new POST route with the router
     * @param string $uri
     * @param array $actions
     * @return void
     */
    public static function post(string $uri, array $actions)
    {
        static::addRouter(['POST'], $uri, $actions);
    }


    /**
     * Return all before register routers
     * @return array
     */
    public static function getAll()
    {
        return static::$routers;
    }

    /**
     * Register all routers
     * @param array $methods
     * @param string $uri
     * @param array $actions
     * @return void
     */
    private static function addRouter(array $methods, string $uri, array $actions)
    {
        static::$routers += [$uri => [
            'methods' => $methods,
            'actions' => $actions,
        ]];
    }
}
