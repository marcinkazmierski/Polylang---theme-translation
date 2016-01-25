<?php
/* Plugin Name: Polylang - theme translation
Plugin URI: https://github.com/marcinkazmierski/Polylang---theme-translation
Description: Polylang - theme translation for WordPress
Version: 1.0
Author: Marcin Kazmierski
License: GPL2
*/

defined('ABSPATH') or die('No script kiddies please!');

class Polylang_Theme_Translation
{
    protected $plugin_path;

    public function __construct()
    {
        $this->plugin_path = dirname(__FILE__);
    }

    public function run()
    {
        $themes = wp_get_themes();

        if (!empty($themes)) {
            foreach ($themes as $name => $theme) {
                $theme_path = $theme->theme_root . DIRECTORY_SEPARATOR . $name;
                $files = $this->get_files_from_dir($theme_path);
                // TODO...
            }
        }
    }

    protected function init()
    {

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
                $results[] = $path;
            } else if ($value != "." && $value != "..") {
                $temp = $this->get_files_from_dir($path);
                $results = array_merge($results, $temp);
            }
        }
        return $results;
    }

    protected function file_scanner()
    {

    }

    protected function add_to_polylang_register()
    {

    }

    public function install()
    {

    }

    public function uninstall()
    {

    }

}

$plugin_obj = new Polylang_Theme_Translation();
$plugin_obj->run();