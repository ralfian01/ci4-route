<?php

namespace Ralfian01\Ci4Route\Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * @var int|null Default port of application
     */
    public $port = 9090;

    /**
     * @var string Hostname of application root
     */
    public $hostname = 'localhost';

    /**
     * URL to your application root.
     * This will be your base URL. Must end with a slash ("/")
     */
    public string $baseURL;

    /**
     * How to use:
     * - "cdn" => "http://cdn.localhost/"
     * - "cdn.dummy" => "http://cdn.dummy/"
     * - "/cdn" => "http://localhost/cdn/"
     * 
     * @var string URL to your application assets
     */
    public $assetHostname = 'cdn';

    /**
     * URL to your application assets
     * Must end with a slash ("/")
     */
    public string $assetURL;

    /**
     * How to use:
     * - "api" => "http://api.localhost/"
     * - "api.dummy" => "http://api.dummy/"
     * - "/api" => "http://localhost/api/"
     * 
     * @var string URL to your application API
     */
    public $apiHostname = 'api';

    /**
     * URL to your application API
     * Must end with a slash ("/")
     */
    public string $apiURL;

    /**
     * URLs that is allowed to access the application
     */
    public array $allowedURLs = [];

    /**
     * @var array Allowed Headers
     * 
     * This determines which headers the requester may include
     */
    public $allowedHeaders = [
        'Authorization',
        'Content-Type',
        'X-Requested-With'
    ];

    /**
     * @var array Allowed HTTP Method
     * 
     * This determines which http methods can be included by the requester
     */
    public $allowedHTTPMethod = [
        'GET',
        'POST',
        'PATCH',
        'PUT',
        'DELETE',
        'OPTIONS'
    ];

    /**
     * Allowed Hostnames in the Site URL other than the hostname in the baseURL.
     * If you want to accept multiple Hostnames, set this.
     *
     * E.g. When your site URL ($baseURL) is 'http://example.com/', and your site
     *      also accepts 'http://media.example.com/' and
     *      'http://accounts.example.com/':
     *          ['media.example.com', 'accounts.example.com']
     * 
     * How to use:
     * - ["."] => ["https://yourdomain.com"]
     * - ["sub"] => "https://sub.yourdomain.com"
     * - ["sub.domain.com"] => "https://sub.domain.com"
     * - ["https://specific.domain.com"] => "https://specific.domain.com"
     *
     * @var string[]
     * @phpstan-var list<string>
     */
    public array $allowedHostnames = [];

    /**
     * --------------------------------------------------------------------------
     * Index File
     * --------------------------------------------------------------------------
     *
     * Typically this will be your index.php file, unless you've renamed it to
     * something else. If you are using mod_rewrite to remove the page set this
     * variable so that it is blank.
     */
    public string $indexPage = 'index.php';

    /**
     * --------------------------------------------------------------------------
     * URI PROTOCOL
     * --------------------------------------------------------------------------
     *
     * This item determines which server global should be used to retrieve the
     * URI string.  The default setting of 'REQUEST_URI' works for most servers.
     * If your links do not seem to work, try one of the other delicious flavors:
     *
     * 'REQUEST_URI'    Uses $_SERVER['REQUEST_URI']
     * 'QUERY_STRING'   Uses $_SERVER['QUERY_STRING']
     * 'PATH_INFO'      Uses $_SERVER['PATH_INFO']
     *
     * WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * --------------------------------------------------------------------------
     * Default Locale
     * --------------------------------------------------------------------------
     *
     * The Locale roughly represents the language and location that your visitor
     * is viewing the site from. It affects the language strings and other
     * strings (like currency markers, numbers, etc), that your program
     * should run under for this request.
     */
    public string $defaultLocale = 'en';

    /**
     * --------------------------------------------------------------------------
     * Negotiate Locale
     * --------------------------------------------------------------------------
     *
     * If true, the current Request object will automatically determine the
     * language to use based on the value of the Accept-Language header.
     *
     * If false, no automatic detection will be performed.
     */
    public bool $negotiateLocale = false;

    /**
     * --------------------------------------------------------------------------
     * Supported Locales
     * --------------------------------------------------------------------------
     *
     * If $negotiateLocale is true, this array lists the locales supported
     * by the application in descending order of priority. If no match is
     * found, the first locale will be used.
     *
     * IncomingRequest::setLocale() also uses this list.
     *
     * @var string[]
     */
    public array $supportedLocales = ['en'];

    /**
     * --------------------------------------------------------------------------
     * Application Timezone
     * --------------------------------------------------------------------------
     *
     * The default timezone that will be used in your application to display
     * dates with the date helper, and can be retrieved through app_timezone()
     *
     * @see https://www.php.net/manual/en/timezones.php for list of timezones supported by PHP.
     */
    public string $appTimezone = 'UTC';

    /**
     * --------------------------------------------------------------------------
     * Default Character Set
     * --------------------------------------------------------------------------
     *
     * This determines which character set is used by default in various methods
     * that require a character set to be provided.
     *
     * @see http://php.net/htmlspecialchars for a list of supported charsets.
     */
    public string $charset = 'UTF-8';

    /**
     * --------------------------------------------------------------------------
     * Force Global Secure Requests
     * --------------------------------------------------------------------------
     *
     * If true, this will force every request made to this application to be
     * made via a secure connection (HTTPS). If the incoming request is not
     * secure, the user will be redirected to a secure version of the page
     * and the HTTP Strict Transport Security header will be set.
     */
    public bool $forceGlobalSecureRequests = false;

    /**
     * --------------------------------------------------------------------------
     * Reverse Proxy IPs
     * --------------------------------------------------------------------------
     *
     * If your server is behind a reverse proxy, you must whitelist the proxy
     * IP addresses from which CodeIgniter should trust headers such as
     * X-Forwarded-For or Client-IP in order to properly identify
     * the visitor's IP address.
     *
     * You need to set a proxy IP address or IP address with subnets and
     * the HTTP header for the client IP address.
     *
     * Here are some examples:
     *     [
     *         '10.0.1.200'     => 'X-Forwarded-For',
     *         '192.168.5.0/24' => 'X-Real-IP',
     *     ]
     *
     * @var array<string, string>
     */
    public array $proxyIPs = [];

    /**
     * --------------------------------------------------------------------------
     * Content Security Policy
     * --------------------------------------------------------------------------
     *
     * Enables the Response's Content Secure Policy to restrict the sources that
     * can be used for images, scripts, CSS files, audio, video, etc. If enabled,
     * the Response object will populate default values for the policy from the
     * `ContentSecurityPolicy.php` file. Controllers can always add to those
     * restrictions at run time.
     *
     * For a better understanding of CSP, see these documents:
     *
     * @see http://www.html5rocks.com/en/tutorials/security/content-security-policy/
     * @see http://www.w3.org/TR/CSP/
     */
    public bool $CSPEnabled = false;



    public function __construct()
    {
        $this->mergeEnv();
        $this->initializeURL();
        $this->initializeAllowedURL();
    }

    /**
     * Port to ignore
     */
    private array $ignorePort = [
        80, 443
    ];


    /**
     * Get ignored ports
     * @return array
     */
    public function getIgnorePort()
    {
        return $this->ignorePort;
    }


    /**
     * Initialize app props
     * @return void
     */
    private function initializeURL()
    {
        $scheme = $this->forceGlobalSecureRequests ? 'https' : 'http';

        $this->baseURL = "{$scheme}://" . $this->makeBaseURL();

        // Initialize asset URI
        $assetURL = $this->normalizeURI($this->assetHostname);
        $this->assetURL = "{$scheme}://{$assetURL}";

        // Initialize API URI
        $apiURL = $this->normalizeURI($this->apiHostname);
        $this->apiURL = "{$scheme}://{$apiURL}";
    }

    /**
     * Initialize Allowed URL from allowed hostnames
     * @return void
     */
    private function initializeAllowedURL()
    {
        foreach ($this->allowedHostnames as $hostname) {

            if ($hostname == '.') {
                $url = $this->normalizeURI($this->baseURL);
                array_push($this->allowedURLs, $url);
                continue;
            }

            if (preg_match('/^(https?:\/\/[A-Za-z0-9_-]+)/i', $hostname)) {
                array_push($this->allowedURLs, $hostname);
                continue;
            }

            $url = $this->normalizeURI($hostname);

            array_push($this->allowedURLs, "http://{$url}");
            array_push($this->allowedURLs, "https://{$url}");
        }
    }

    /**
     * Make Base URL from $hostname
     * @return string
     */
    private function makeBaseURL()
    {
        $hostname = $this->hostname;

        if (!empty($this->port) && !in_array($this->port, $this->ignorePort))
            $hostname .= ":{$this->port}";

        return $hostname;
    }

    /**
     * Normalize URI
     * @return string
     */
    private function normalizeURI(string $url)
    {
        $hostname = $this->hostname;

        if (!empty($this->port) && !in_array($this->port, $this->ignorePort))
            $hostname .= ":{$this->port}";

        if (preg_match('/^(https?:\/\/[A-Za-z0-9_-]+)/i', $url)) {
            // Format: ://<hostname> => http://hostname or https://hostname
            return $url;
        } elseif (preg_match('~^/[A-Za-z_-]+$~', $url)) {
            // Format: /<segment> => hostname/segment
            return "{$hostname}{$url}";
        } elseif (preg_match('~^[A-Za-z_-]+\.[A-Za-z_-]+$~', $url)) {
            // Format: <sub>.<domain> => sub.custom_domain.com
            return $url;
        } elseif (preg_match('~^[A-Za-z_-]+$~', $url)) {
            // Format: <sub> => sub.hostname
            return "{$url}.{$hostname}";
        } else {
            return $url;
        }
    }

    /**
     * Combine Application configuration with Environment files.
     * Some configurations have to be set inside the App class
     * @return void
     */
    private function mergeEnv()
    {
        if (isset($_ENV['app']['port']))
            $this->port = $_ENV['app']['port'];

        if (isset($_ENV['app']['hostname']))
            $this->hostname = $_ENV['app']['hostname'];

        if (isset($_ENV['app']['forceGlobalSecureRequests']))
            $this->forceGlobalSecureRequests = filter_var($_ENV['app']['forceGlobalSecureRequests'], FILTER_VALIDATE_BOOLEAN);
    }
}
