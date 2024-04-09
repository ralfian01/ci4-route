<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use Config\Services;

class Web extends BaseRouteCollection
{
    /**
     * @param Closure|array|null|string $callable
     */
    public static function setDefault404($callable = null)
    {
        self::$routes = Services::routes();

        self::$routes->get('(:any)', $callable);
    }
}
