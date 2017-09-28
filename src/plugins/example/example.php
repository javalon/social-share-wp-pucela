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

//Ponemos un texto en el footer.
function hacer_accion(){
	echo "<h1 style='position:absolute;'>Hello WP Puclea!!!!</h1>";
}

add_action('wp_footer','hacer_accion');

//Añadimos al titlulo de cada entrada un texto
function hacer_filtro($title, $id=null){
	return "WP Pucela:". $title;
}

add_filter('the_title', 'hacer_filtro', 10, 2);

