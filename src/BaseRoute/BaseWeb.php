<?php

use Ralfian01\Ci4RouteManager\Collection\Web;

$routeConfig = Web::routeConfig('/');

Web::group(
    '',
    $routeConfig->options,
    function () {

        include_once(APPPATH . 'Config/Routes/Web.php');
    }
);
