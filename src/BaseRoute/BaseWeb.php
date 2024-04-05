<?php

use Ralfian01\Ci4RouteManager\Collection\Web;
use Config\App;

$routeConfig = Web::routeConfig((new App)->hostname);

Web::group(
    $routeConfig->segment,
    $routeConfig->options,
    function () {

        include APPPATH . 'Config/Routes/Web.php';
    }
);
