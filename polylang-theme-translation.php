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

    protected $files_extensions = array(
        // 'php',
        'inc',
        'twig',
    );

    public function __construct()
    {
        $this->plugin_path = dirname(__FILE__);
    }

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


    public function init()
    {
        $this->run();
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

    protected function add_to_polylang_register($strings, $context)
    {
        if (!empty($strings)) {
            foreach ($strings as $string) {
                pll_register_string($string, $string, $context);
            }
        }
    }

    public function install()
    {

    }

    public function uninstall()
    {

    }

}

add_action('init', 'process_polylang_theme_translation');

function process_polylang_theme_translation()
{
    $plugin_obj = new Polylang_Theme_Translation();
    $plugin_obj->init();
}
