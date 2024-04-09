<?php

use Ralfian01\Ci4RouteManager\Collection\REST;
use Config\App;

$routeConfig = REST::routeConfig((new App)->apiHostname);

REST::group(
    $routeConfig->segment,
    $routeConfig->options,
    function ($route) {

        include_once(APPPATH . 'Config/Routes/REST.php');
    }
);
