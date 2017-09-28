
##Plugin: Activate y deactivate

```php
<?php
/*
Plugin Name:  WordPress.org Plugin
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin Header Comment
Version:      20160911
Author:       WordPress.org
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wporg
Domain Path:  /languages
*/

function pluginprefix_setup_post_types()
{
    // registramos un nuevo tipo de post llamado "book"
    register_post_type( 'book', ['public' => 'true'] );
}
add_action( 'init', 'pluginprefix_setup_post_type' );
 
function pluginprefix_install()
{
    // Llamamos a nuestra función que registra el CPT "book"
    pluginprefix_setup_post_type();
 
    // limpiamos los enlaces permanentes despues de haber registrado el CPT
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'pluginprefix_install' );

function pluginprefix_deactivation()
{
    // Nuesto CPT "book" se elimina automaticamente
 
    // limpiamos los enlaces permantentes para no dejar rastro del CTP "book"
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivation' );

```
