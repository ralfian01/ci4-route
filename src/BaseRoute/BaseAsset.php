<?php

use Ralfian01\Ci4RouteManager\Collection\Web;
use Config\App;

/**
 * @var RouteCollection $routes
 */

$routeConfig = Web::routeConfig((new App)->hostname);

Web::group(
    $routeConfig->segment,
    $routeConfig->options,
    function () {

        include APPPATH . 'Routes/REST.php';
    }
);
