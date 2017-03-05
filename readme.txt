=== Theme and plugin translation for Polylang ===
Contributors: marcinkazmierski
Tags: polylang, multilingual, translate, translation, language, languages, twig, multilanguage, international, localization, timber, theme
Requires at least: 3.8
Tested up to: 4.7.2
Stable tag: 1.4.0
License: GPL2

Theme and plugin translation using Polylang for WordPress.
Extension for Polylang plugin.

== Description ==
= What is "Theme and plugin translation for Polylang"? =

Extension for Polylang plugin (Polylang is an extension to make multilingual WordPress websites.).
Plugin is needed to translate the WordPress themes and plugins by Polylang.

= How it is work? =

"Theme and plugin translation for Polylang" automatically searches all files of WordPress themes and plugins. It chooses from this file only those files with extensions:

*	php
*	inc
*	twig

In addition, is implemented the integration with Timber library (read more: http://timber.upstatement.com) – which allows to translate twig's skins in simple way.
Plugin in searched skins or plugins chooses texts from Polylang functions, such as:

*    pll_e();
*    pll__();

On the timber context declare this functions like:

`$context['pll_e'] = TimberHelper::function_wrapper('pll_e');`

`$context['pll_'] = TimberHelper::function_wrapper('pll_');`


See more on: https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
This functions are defined by Polylang plugin for printing translations.
Thanks "Theme and plugin translation for Polylang" you can find these strings to translate and add to Polylang register on very simple way.
And then you can translate these texts from the admin dashboard.
The scan result can be seen on the tab with translations:
Settings -> Languages -> String translation
or
Languages -> String translation

You don't need programs like poedit – you don't change files with extensions like: .pot, .po, .mo.
"Theme and plugin translation for Polylang" is highly efficient because the scanner is worked only on admin dashbord in tab:
Settings -> Languages -> String translation
or
Languages -> String translation


Github repository: https://github.com/marcinkazmierski/Polylang---theme-translation

== Installation ==
This plugin requires installed and activated the Polylang plugin,
This plugin requires PHP 5.0

1. Upload the "Theme and plugin translation for Polylang" folder to the /wp-content/plugins/ directory on your web server.
2. Activate the plugin through the Plugins menu in WordPress.
3. Go to the Settings -> Languages -> String translation or Languages -> String translation and find your texts.


= How to enable Twig extension with polylang theme translations? [Timber plugin] =

1. In functions.php add:
`if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });
    return;
}


function timber_context()
{
    $context = Timber::get_context();
    $post = Timber::query_post();
    $context['post'] = $post;
    $context['pll_e'] = TimberHelper::function_wrapper('pll_e');
    $context['pll__'] = TimberHelper::function_wrapper('pll__');
    return $context;
}

Timber::$dirname = array('templates', 'views'); // directory names with twig templates
timber_context();`

Next, for example in index.php add:
`<?php
 $context = timber_context();
 $templates = array('home.twig', 'index.twig'); // twig files for render
 Timber::render($templates, $context);
`

Then you can use in twig templates polylang functions like this (in templates/home.twig):
`{% extends "base.twig" %}
 {% block content %}
     <p>
         {{ pll_e("Test text on TWIG template 1.") }}
     </p>
     <p>
         {{ pll__("Test text on TWIG template 2.") }}
     </p>
 {% endblock %}`




== Screenshots ==

1. Screen show "Polylang" strings translate tab settings with "Theme and plugin translation for Polylang".

== Changelog ==

= 2.0.0 - 2017/03/05 =

* Added plugin scanner.
* Updated version.

= 1.4.0 - 2017/01/29 =

* Polylang version 2.1 - fixed: polylang changed default tab.
* Updated version.

= 1.3.3 - 2017/01/09 =

* Test with WordPress 4.7 version and Polylang version 2.0.12.
* Updated version.

= 1.3.2 - 2016/09/07 =

* Test with 4.6.1 WordPress version.
* Updated version.

= 1.3.1 - 2016/06/07 =

* Added plugin logo.

= 1.3 - 2016/05/15 =

* Fixed warnings.
* Test with 4.5 WordPress version.
* Updated description.
* Updated version.

= 1.2 - 2016/03/27 =

* Updated description.

= 1.1 - 2016/02/03 =

* Fixed readme.txt


