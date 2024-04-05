<?php

use Ralfian01\Ci4RouteManager\Collection\REST;
use Config\App;

/**
 * @var RouteCollection $routes
 */

$routeConfig = REST::routeConfig((new App)->apiHostname);

REST::group(
    $routeConfig->segment,
    $routeConfig->options,
    function () {

        include APPPATH . 'Config/Routes/REST.php';
    }
);
