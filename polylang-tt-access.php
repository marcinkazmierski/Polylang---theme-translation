<?php

defined('ABSPATH') or die('No script kiddies please!');

/**
 * Class Polylang_TT_access.
 */
class Polylang_TT_access
{

    protected $plugin_name = 'Polylang - theme translation';
    private static $instance = false;

    /**
     * Private constructor.
     */
    private function __construct()
    {
        // TODO.
    }

    /**
     * Singleton.
     */
    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new Polylang_TT_access();
        }
        return self::$instance;
    }

    /**
     * Check plugin access.
     * @return bool - if plugin have access to work.
     */
    public function chceck_plugin_access()
    {
        if (!version_compare(phpversion(), '5', '>=')) {
            add_action('admin_notices', array($this, 'error_php_version'));
            return false;
        } else if (!defined('POLYLANG_VERSION')) {
            add_action('admin_notices', array($this, 'error_polylang_disable'));
            return false;
        } else {
            return true;
        }
    }

    /**
     * Display PHP version error.
     */
    public function error_php_version()
    {
        $class = "error";
        $message = 'The minimum supported PHP version is 5.0 (Current is: ' . phpversion() . ').';
        print "<div class=\"$class\"> <p>$this->plugin_name: $message</p></div>";
    }

    /**
     * Display PHP version error.
     */
    public function error_polylang_disable()
    {
        $class = "error";
        $message = 'Please, download and activate <a href="https://wordpress.org/plugins/polylang/">Polylang</a> plugin.';
        print "<div class=\"$class\"> <p>$this->plugin_name: $message</p></div>";
    }
}