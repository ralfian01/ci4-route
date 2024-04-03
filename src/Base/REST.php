<?php

namespace Ralfian01\Ci4Route\Base;

use Config\App;

class REST extends BaseRoute
{
    protected function setRoutes($name, $arguments)
    {
        $config = new App;
        $routeConfig = self::routeConfig($config->apiHostname);

        return $this->routes->group(
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
        self::match(['get', 'post', 'put', 'patch', 'delete'], '/', $callable);
        self::match(['get', 'post', 'put', 'patch', 'delete'], '(:any)', $callable);
    }
}
