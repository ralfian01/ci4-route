<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use Config\App;
use Config\Services;

class REST extends BaseRouteCollection
{
    protected static function setRoutes($name, $arguments)
    {
        $config = new App;
        $routeConfig = self::routeConfig($config->apiHostname);

        return self::$routes->group(
            $routeConfig->segment,
            $routeConfig->options,
            static function ($routes) use ($name, $arguments) {

                return $routes->{$name}(...$arguments);
            }
        );
    }

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
