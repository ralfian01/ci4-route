<?php

use Ralfian01\Ci4RouteManager\Collection\BaseRouteCollection;
use Config\App;
use Config\Assets;

/**
 * @var RouteCollection $routes
 */

$routeConfig = BaseRouteCollection::routeConfig((new App)->assetHostname);
$assetConfig = new Assets;

$routes->group(
    $routeConfig->segment,
    $routeConfig->options,
    function ($routes) use ($assetConfig) {

        $routes->get('/', $assetConfig->assetController);
        $routes->get('(:any)', $assetConfig->assetController);
    }
);
