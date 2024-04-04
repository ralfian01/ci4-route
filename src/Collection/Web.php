<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use Config\App;

class Web extends BaseRouteCollection
{
    protected static function setRoutes($name, $arguments)
    {
        $config = new App;
        $routeConfig = self::routeConfig($config->hostname);

        return self::$routes->group(
            '',
            [],
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
        self::get('(:any)', $callable);
    }
}
