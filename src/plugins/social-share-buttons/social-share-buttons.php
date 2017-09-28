<?php
/*
Plugin Name:  Social share WP Pucela Edition
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  Basic WordPress Plugin to share on Facebook and Twitter
Version:      1
Author:       Javier Alonso
Author URI:   https://developer.wordpress.org/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
*/

function addStyles(){
	?>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<style>
		.social-share-buttons{
			
		}
	</style>
	<?php
}

add_action( 'wp_head', "addStyles", 10);

function addScript(){
	wp_enqueue_script( 'social-js', plugin_dir_url( __FILE__ ).'/js/social-buttons.js', array('jquery'), true, true );
}


add_action( 'wp_enqueue_scripts', 'addScript' );


function addButtons($content){
	$output = '';
	if(!is_page()){
		$permalink = get_permalink();
		$title = strip_tags(get_the_title());
		$output .= '
			<div class="social-share-buttons">
				<a href="'.$permalink.'" class="social-share" data-rrss="facebook" data-title="'.$title.'"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="'.$permalink.'" class="social-share" data-rrss="twitter" data-title="'.get_bloginfo("name"). " - ".$title.'"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			</div>';
		}
	return $output . $content;
}

add_filter('the_content', 'addButtons', 10, 1);