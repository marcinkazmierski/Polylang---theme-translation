<?php

defined('ABSPATH') or die('No script kiddies please!');

/**
 * Class Polylang_TT_admin.
 */
class Polylang_TT_admin
{
    protected $tab_name = array(
        'key' => 'pll_tt_conf',
        'name' => 'PLL - theme translation settings',
    );

    /**
     * Constructor.
     */
    public function __construct()
    {
        // TODO.
    }

    /**
     * Init engine.
     */
    public function init()
    {
        add_filter('pll_settings_tabs', array($this, 'add_tab'), 13);
        add_action('pll_settings_active_tab_' . $this->tab_name['key'], array($this, 'settings_page'));
    }

    public function add_tab($tabs)
    {
        $tabs[$this->tab_name['key']] = $this->tab_name['name'];
        return $tabs;
    }

    public function settings_page()
    {
        print '<p>Polylang - theme translation: Settings page: <strong>TODO.</strong></p>';
    }
}

/**
 *
 */
add_action('admin_menu', 'process_polylang_tt_admin');

function process_polylang_tt_admin()
{
    if (Polylang_TT_access::get_instance()->chceck_plugin_access()) {
        $plugin_obj = new Polylang_TT_admin();
        $plugin_obj->init();
    }
}