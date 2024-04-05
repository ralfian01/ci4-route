<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use CodeIgniter\Router\RouteCollection;
use Config\Services;
use Config\App;
use stdClass;

/**
 * @method static RouteCollection     get(string $from, $to, ?array $options = null)
 * @method static RouteCollection     post(string $from, $to, ?array $options = null)
 * @method static RouteCollection     put(string $from, $to, ?array $options = null)
 * @method static RouteCollection     patch(string $from, $to, ?array $options = null)
 * @method static RouteCollection     delete(string $from, $to, ?array $options = null)
 * @method static RouteCollection     head(string $from, $to, ?array $options = null)
 * @method static RouteCollection     options(string $from, $to, ?array $options = null)
 * @method static RouteCollection     group(string $name, ...$params)
 * @method static RouteCollection     match(array $verbs = [], string $from = '', $to = '', ?array $options = null)
 * @method static RouteCollection     setDefault404($callable = null)
 */
class BaseRouteCollection
{
    /**
     * @var RouteCollection Route collection
     */
    protected static $routes;

    public static function __callStatic($name, $arguments)
    {
        self::$routes = Services::routes();

        return static::setRoutes($name, $arguments);
    }

    /**
     * Setup Routes
     */
    protected static function setRoutes($name, $arguments)
    {
        if ($name == 'group') {
            return self::$routes->group($arguments[0], function ($route) use ($arguments) {
                self::$routes = $route;
                $arguments[1](self::$routes);
            });
        }

        return self::$routes->{$name}(
            $arguments[0],
            $arguments[1],
            $arguments[2] ?? null
        );
    }

    // public static function group(string $name, ...$params)
    // {
    //     if (!isset(self::$routes))
    //         self::$routes = Services::routes();

    //     $callback = array_pop($params);

    //     return self::$routes->group($name, $params, function ($route) use ($callback) {
    //         self::$routes = $route;
    //         return $callback(self::$routes);
    //     });
    // }


    /**
     * @internal
     */
    protected static function routeConfig(string $hostname)
    {
        $appConfig = new App();
        $return = new stdClass();

        if (preg_match('~^/[A-Za-z_-]+$~', $hostname)) {
            // Format: /<url>
            $return->segment = $hostname;
            $return->options = [];
        } elseif (preg_match('~^[A-Za-z_-]+\.[A-Za-z_-]+$~', $hostname)) {
            // Format: subdomain.domain
            $return->segment = '/';
            $return->options = [];
            $return->options['subdomain'] = explode('.', $hostname)[0];
            $return->options['hostname'] = str_replace('://', "://{$return->options['subdomain']}.", $appConfig->baseURL);
            $return->options['hostname'] = str_replace(['http://', 'https://'], '', $return->options['hostname']);
        } elseif (preg_match('~^[A-Za-z_-]+$~', $hostname)) {
            // Format: subdomain
            $return->segment = '/';
            $return->options['subdomain'] = $hostname;
            $return->options['hostname'] = str_replace('://', "://{$return->options['subdomain']}.", $appConfig->baseURL);
            $return->options['hostname'] = str_replace(['http://', 'https://'], '', $return->options['hostname']);
        } else {
            $return->segment = '/';
            $return->options = [];
        }

        return $return;
    }
}
