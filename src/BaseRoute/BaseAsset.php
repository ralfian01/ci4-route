<?php

use Ralfian01\Ci4RouteManager\Collection\BaseRouteCollection;
use Config\App;

/**
 * @var RouteCollection $routes
 */

$routeConfig = BaseRouteCollection::routeConfig((new App)->assetHostname);

$routes->group(
    $routeConfig->segment,
    $routeConfig->options,
    function ($routes) {

        echo "Worked";
    }
);
