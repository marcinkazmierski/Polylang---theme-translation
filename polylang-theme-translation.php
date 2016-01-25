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

    }

    protected function init()
    {

    }

    protected function get_files_from_dir($dir_name)
    {

    }

    protected function file_scanner()
    {

    }

}

$plugin_obj = new Polylang_Theme_Translation();
$plugin_obj->run();