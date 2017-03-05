# Theme and plugin translation for Polylang #

Silnik do łatwego tłumaczenia skórek i wtyczek WordPress'owych rozszerzający wtyczkę Polylang.

[EN doc version](README.md)

## Tutorial ###

### TWIG

1) Instalujemy i aktywujemy wtyczkę Timber: https://pl.wordpress.org/plugins/timber-library/

2) W pliku `functions.php` skórki WP (theme) w pierwszej kolejności należy sprawdzić czy faktycznie biblioteka Timbera jest włączona.

```php
<?php 
if (!class_exists('Timber')) {
  add_action('admin_notices', function () {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin.</p></div>';
  });
  return;
}
```

3) Definiujemy context dla timbera w pliku `functions.php`. 
Należy dodać możliwość korzystania z funkcji polylang (pll_e, pll__):
```php
<?php 
function timber_context() {
  $context = Timber::get_context();
  $context['pll_e'] = TimberHelper::function_wrapper('pll_e');
  $context['pll__'] = TimberHelper::function_wrapper('pll__');
  return $context;
}
```

4) Definiujemy dla Timbera katalog, w którym będą umieszaczane templatki twig'owe 
i ładujemy context timbera do WordPress'a.

```php
<?php 
Timber::$dirname = array('templates');
timber_context();
```

5) W pliku szablonu np. w index.php lub page.php renderujemy twig'ową templatkę 
(plik index.twig musi być umieszony w katalogu templates, tak jak zdefiniowane zostało w poprzednim kroku):
```php
<?php
$context = timber_context();
$templates = array( 'index.twig' );
Timber::render( $templates, $context );
```

6) W zdefiniowanym wcześniej pliku `index.twig` można skorzystać z funkcji polyalng:
```twig
{% extends "base.twig" %}
 {% block content %}
     <p>
         {{ pll_e("Test text on TWIG template 1.") }}
     </p>
     <p>
         {{ pll__("Test text on TWIG template 2.") }}
     </p>
 {% endblock %}
```
`{% extends "base.twig" %}` - oznacza, że rozszerzany jest główny i podstawowy plik szablonu dla skórki WordPress. 
Plik ten nazywa się `base.twig` i zawiera definicję całej struktury html.


### HTML

1) Wystarczy w każdym miejscu templatki html'owej, w miejscu wyświetlania/generowania 
statycznych tekstów użyć funkcji polylang:
```php
<?php 
pll_e('My string'); // similar to _e();
// ---
$var = pll_('My string'); // similar to __();
```