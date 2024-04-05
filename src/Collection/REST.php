<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use Config\App;
use Config\Services;

class REST extends BaseRouteCollection
{
    protected static function baseRoute(callable $callback)
    {
        if (!isset(self::$routes))
            self::$routes = Services::routes();

        $config = new App;
        $routeConfig = self::routeConfig($config->apiHostname);

        return self::$routes->group(
            $routeConfig->segment,
            $routeConfig->options,
            function ($route) use ($callback) {
                self::$routes = $route;
                return $callback($route);
            }
        );
    }

    // public static function get(string $from, $to, ?array $options = null)
    // {
    //     self::$routes = Services::routes(true);

    //     // return self::$routes->get($from, $to, $options);

    //     return self::baseRoute(function () use ($from, $to, $options) {
    //         return self::$routes->get($from, $to, $options);
    //     });
    // }

    // public static function group(string $name, ...$params)
    // {
    //     self::$routes = Services::routes();

    //     $callback = array_pop($params);

    //     return self::$routes->group($name, $params, function ($route) use ($callback) {
    //         $route->fromGroup = true;
    //         self::$routes = $route;
    //         return $callback(self::$routes);
    //     });
    // }

    // public static function group(string $name, ...$params)
    // {
    //     return self::baseRoute(function ($route) use ($name, $params) {
    //         $callback = array_pop($params);

    //         return $route->group($name, $params, function ($route) use ($callback) {
    //             $route->fromGroup = true;
    //             self::$routes = $route;
    //             return $callback(self::$routes);
    //         });
    //     });
    // }


    /**
     * @param Closure|array|null|string $callable
     */
    public static function setDefault404($callable = null)
    {
        if (!isset(self::$routes))
            self::$routes = Services::routes();

        self::$routes->match(['get', 'post', 'put', 'patch', 'delete'], '/', $callable);
        self::$routes->match(['get', 'post', 'put', 'patch', 'delete'], '(:any)', $callable);
    }
}
