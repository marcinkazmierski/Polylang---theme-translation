# Theme translation for Polylang


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


On the timber context declare this functions like:

$context['pll_e'] = TimberHelper::function_wrapper('pll_e');

$context['pll_'] = TimberHelper::function_wrapper('pll_');

See more on: https://polylang.wordpress.com/documentation/documentation-for-developers/functions-reference/

This functions are definied by Polylang plugin for printing translations.

Thanks "Theme translation for Polylang" you can find these strings to translate and add to Polylang register on very simple way.
And then you can translate these texts from the admin dashboard.

The scan result can be seen on the tab with translations:

Settings -> Languages -> String translation

You don't need programs like poedit – you don't change files with extensions like: .pot, .po oraz .mo.

"Theme translation for Polylang" is highly efficient because the skaner is worked only on admin dashbord in tab: Settings -> Languages -> String translation.

WordPress.org: https://pl.wordpress.org/plugins/theme-translation-for-polylang/