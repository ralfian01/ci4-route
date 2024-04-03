<?php

namespace Ralfian01\Ci4RouteManager\Collection;

use CodeIgniter\Router\RouteCollection;
use Config\Services;
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
     * Route pack
     */
    protected RouteCollection $routes;

    public static function __callStatic($name, $arguments)
    {
        $instance = new static;
        return $instance->setRoutes($name, $arguments);
    }

    public function __construct()
    {
        if (!isset($this->routes))
            $this->routes = Services::routes();
    }

    /**
     * Setup Routes
     */
    protected function setRoutes($name, $arguments)
    {
        return $this->routes->{$name}(
            $arguments[0],
            $arguments[1],
            $arguments[2] ?? null
        );
    }

    /**
     * @internal
     */
    protected static function routeConfig(string $hostname)
    {
        $return = new stdClass();

        if (preg_match('~^/[A-Za-z_-]+$~', $hostname)) {
            // Format: /<url>
            $return->segment = $hostname;
            $return->options = [];
        } elseif (preg_match('~^[A-Za-z_-]+\.[A-Za-z_-]+$~', $hostname)) {
            // Format: subdomain.domain
            $return->segment = '';
            $return->options = [
                'subdomain' => explode('.', $hostname)[0],
            ];
        } elseif (preg_match('~^[A-Za-z_-]+$~', $hostname)) {
            // Format: subdomain
            $return->segment = '';
            $return->options = [
                'subdomain' => $hostname,
            ];
        } else {
            $return->segment = '';
            $return->options = [];
        }

        return $return;
    }
}
