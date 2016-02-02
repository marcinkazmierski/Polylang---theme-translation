=== Theme translation for Polylang ===
Contributors: marcinkazmierski
Tags: polylang, multilingual, translate, translation, language, languages, twig, multilanguage, international, localization, timber, theme
Requires at least: 3.8
Tested up to: 4.4
Stable tag: 4.3
License: GPL2

Theme translation using Polylang for WordPress.
Extension for Polylang plugin.

== Description ==
What is "Theme translation for Polylang"?
Extension for Polylang plugin (Polylang is an extension to make multilingual WordPress websites.).
Plugin is needed to translate the WordPress themes by Polylang.

How it is work?
"Theme translation for Polylang" automatically searches all files of WordPress themes. It chooses  from this file only those files with extensions:
- php
- inc
- twig

In addition, is implemented the integration with Timber library (read more: http://timber.upstatement.com) – which allows to translate twig's skins in simple way.
Plugin in searched skins chooses texts from Polylang functions, such as:
- pll_e
- pll__

See more on: https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/
This functions are definied by Polylang plugin for printing translations.
Thanks "Theme translation for Polylang" you can find these strings to translate and add to Polylang register on very simple way.
And then you can translate these texts from the admin dashboard.
The scan result can be seen on the tab with translations:
Settings -> Languages -> String translation

You don't need programs like poedit – you don't change files with extensions like: .pot, .po oraz .mo.
"Theme translation for Polylang" is highly efficient because the skaner is worked only on admin dashbord in tab:
Settings -> Languages -> String translation.

Github repository: https://github.com/marcinkazmierski/Polylang---theme-translation

== Installation ==
This plugin requires installed and activated the Polylang plugin,
This plugin requires PHP 5.0

1. Upload the "Theme translation for Polylang" folder to the /wp-content/plugins/ directory on your web server.
2. Activate the plugin through the Plugins menu in WordPress.
3. Go to the Settings -> Languages -> String translation and find your texts.

== Screenshots ==

== Changelog ==
