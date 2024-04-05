<?php

use Ralfian01\Ci4RouteManager\Collection\REST;
use Config\App;
use Config\Routing;

$routingConfig = new Routing;
$routeConfig = REST::routeConfig((new App)->apiHostname);

REST::group(
    $routeConfig->segment,
    function () use ($routingConfig, $routeConfig) {

        foreach ($routingConfig->routeReferenceFiles as $routeReferenceFile) {
            include_once($routeReferenceFile);
        }
    }
);
