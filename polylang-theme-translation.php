<?php
/* Plugin Name: Polylang - theme translation
Plugin URI: https://github.com/marcinkazmierski/Polylang---theme-translation
Description: Polylang - theme translation for WordPress
Version: 1.0
Author: Marcin Kazmierski
License: GPL2
*/

defined('ABSPATH') or die('No script kiddies please!');

/**
 * Class Polylang_Theme_Translation.
 */
class Polylang_Theme_Translation
{
    protected $plugin_path;

    protected $plugin_name = 'Polylang - theme translation';

    protected $files_extensions = array(
        'php',
        'inc',
        'twig',
    );

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->plugin_path = dirname(__FILE__);
    }

    /**
     * Run plugin.
     */
    protected function run()
    {
        $themes = wp_get_themes();
        if (!empty($themes)) {
            foreach ($themes as $name => $theme) {
                $theme_path = $theme->theme_root . DIRECTORY_SEPARATOR . $name;
                $files = $this->get_files_from_dir($theme_path);
                $strings = $this->file_scanner($files);
                $this->add_to_polylang_register($strings, $name);
            }
        }
    }

    /**
     * Init engine.
     */
    public function init()
    {
        if (!version_compare(phpversion(), '5', '>=')) {
            add_action('admin_notices', array($this, 'error_php_version'));
        } else {
            $this->run();
        }
    }

    /**
     * Get files from dictionary recursive.
     */
    protected function get_files_from_dir($dir_name)
    {
        $results = array();
        $files = scandir($dir_name);
        foreach ($files as $key => $value) {
            $path = realpath($dir_name . DIRECTORY_SEPARATOR . $value);
            if (!is_dir($path)) {
                $path_parts = pathinfo($path);
                if (in_array($path_parts['extension'], $this->files_extensions)) {
                    $results[] = $path;
                }
            } else if ($value != "." && $value != "..") {
                $temp = $this->get_files_from_dir($path);
                $results = array_merge($results, $temp);
            }
        }
        return $results;
    }

    /**
     *  Get strings from polylang methods.
     */
    protected function file_scanner($files)
    {
        $strings = array();
        foreach ($files as $file) {
            preg_match_all("/pll_[_e][\s]*\([\s]*[\'\"](.*?)[\'\"][\s]*\)/s", file_get_contents($file), $matches);
            if (!empty($matches[1])) {
                $strings = array_merge($strings, $matches[1]);
            }
        }
        return $strings;
    }

    /**
     * Add strings to polylang register.
     */
    protected function add_to_polylang_register($strings, $context)
    {

        if (!empty($strings)) {
            foreach ($strings as $string) {
                pll_register_string($string, $string, $context);
            }
        }
    }

    /**
     * Display PHP version error.
     */
    public function error_php_version()
    {
        $class = "error";
        $message = 'The minimum supported PHP version is 5.0 (Current is: ' . phpversion() . ').';
        echo "<div class=\"$class\"> <p>$this->plugin_name: $message</p></div>";
    }
}

/**
 * Init Polylang Theme Translation plugin.
 */
add_action('init', 'process_polylang_theme_translation');

function process_polylang_theme_translation()
{
    global $pagenow;
    if (is_admin() && $pagenow === 'options-general.php' && isset($_GET['page']) && isset($_GET['tab'])) { // wp-admin/options-general.php?page=mlang&tab=strings
        if ($_GET['page'] === 'mlang' && $_GET['tab'] === 'strings') {
            $plugin_obj = new Polylang_Theme_Translation();
            $plugin_obj->init();
        }
    }
}

