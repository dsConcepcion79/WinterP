<?php
function_exists('add_action') or die;

require_once AUTOUPDATER_WP_PLUGIN_PATH . 'app/Admin.php';
require_once AUTOUPDATER_WP_PLUGIN_PATH . 'app/Whitelabelling.php';

class AutoUpdater_WP_Application
{
    protected static $instance = null;
    protected $slug = '';
    protected $plugin_filename = '';

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!is_null(static::$instance)) {
            return static::$instance;
        }

        static::$instance = new AutoUpdater_WP_Application();

        return static::$instance;
    }

    public function __construct()
    {
        $this->siteOffline(); // display the maintenace mode as early as possible, don't use WordPress "init" action
        add_action('plugins_loaded', array($this, 'loadLanguages'));
        add_action('init', array($this, 'sitemap'));

        AutoUpdater_WP_Whitelabelling::getInstance();
        AutoUpdater_WP_Admin::getInstance();
    }

    public function loadLanguages()
    {
        load_plugin_textdomain('autoupdater', false, 'autoupdater/lang');
    }

    public function siteOffline()
    {
        global $pagenow;

        // Allow to log in to the back-end and white list the AutoUpdater service
        if (
            is_admin() || $pagenow == 'wp-login.php' ||
            AutoUpdater_Request::getQueryVar('autoupdater_nonce') ||
            AutoUpdater_Request::getQueryVar('autoupdater') ||
            php_sapi_name() == 'cli'
        ) {
            return;
        }

        if (function_exists('getallheaders')) {
            foreach (getallheaders() as $name => $value) {
                if (stristr($name, 'autoupdater-')) {
                    return;
                }
            }
        }

        if (!AutoUpdater_Maintenance::getInstance()->isEnabled()) {
            return;
        }

        $path = WP_CONTENT_DIR . '/autoupdater/tmpl/offline.tmpl.php';
        if (!AutoUpdater_Filemanager::getInstance()->exists($path)) {
            $path = AUTOUPDATER_WP_PLUGIN_PATH . 'tmpl/offline.tmpl.php';
        }

        // Get template into buffer
        ob_start();
        include $path; // phpcs:ignore
        $body = ob_get_clean();

        AutoUpdater_Response::getInstance()
            ->setCode(503)
            ->setMessage('Service Unavailable')
            ->setHeader('Retry-After', '3600')
            ->setAutoupdaterHeader()
            ->setBody($body)
            ->send();
    }

    public function sitemap()
    {
        if (is_admin() || AutoUpdater_Request::getQueryVar('autoupdater') !== 'sitemap') {
            return;
        }

        $limit = AutoUpdater_Request::getQueryVar('wpe_limit', 20);
        $data = AutoUpdater_Task::getInstance('WoocommerceUrls', array('limit' => $limit))->doTask();
        $urls = empty($data['urls']) ? array() : $data['urls'];

        if (empty($urls) || count(array_filter($urls, function ($value) {
            return !filter_var($value, FILTER_VALIDATE_URL);
        }))) {
            // There are no URLs or some of them are invalid
            AutoUpdater_Response::getInstance()
                ->setCode(404)
                ->setAutoupdaterHeader()
                ->setHeader('Content-Type', 'text/plain')
                ->setBody('')
                ->send();
        }

        $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\r\n"
            . '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\r\n";
        foreach ($urls as $url) {
            $sitemap .= '<url><loc>' . esc_url($url) . '</loc></url>' . "\r\n";
        }
        $sitemap .= '</urlset>';

        AutoUpdater_Response::getInstance()
            ->setCode(200)
            ->setAutoupdaterHeader()
            ->setHeader('Content-Type', 'text/xml')
            ->setBody($sitemap)
            ->send();
    }
}
