
##Plugin: Pantalla de opciones de administración

Añadir al final de social-share-buttons.php

```php
function ssbwpp_settings_init() {
	 // register a new setting for "ssbwpp" page
	 register_setting( 'ssbwpp', 'ssbwpp_options' );
	 
	 // register a new section in the "ssbwpp" page
	 add_settings_section(
		 'ssbwpp_section_developers',
		 __( 'Social Share Buttons', 'ssbwpp' ),
		 'ssbwpp_section_developers_cb',
		 'ssbwpp'
	 );
	 
	 // register a new field in the "ssbwpp_section_developers" section, inside the "ssbwpp" page
	 add_settings_field(
		 'ssbwpp_field_selector', // as of WP 4.6 this value is used only internally
		 // use $args' label_for to populate the id inside the callback
		 __( 'Debajo o encima del contenido', 'ssbwpp' ),
		 'ssbwpp_field_selector_cb',
		 'ssbwpp',
		 'ssbwpp_section_developers',
		 [
			 'label_for' => 'ssbwpp_field_selector',
			 'class' => 'ssbwpp_row',
			 'ssbwpp_custom_data' => 'custom',
		 ]
	 );
}
 
/**
 * register our ssbwpp_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'ssbwpp_settings_init' );
 
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function ssbwpp_section_developers_cb( $args ) {
	 ?>
	 <p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Cambia lo que quieras.', 'ssbwpp' ); ?></p>
	 <?php
}
 
function ssbwpp_field_selector_cb( $args ) {
	 // get the value of the setting we've registered with register_setting()
	 $options = get_option( 'ssbwpp_options' );
	 // output the field
	 ?>
	 <select id="<?php echo esc_attr( $args['label_for'] ); ?>" data-custom="<?php echo esc_attr( $args['ssbwpp_custom_data'] ); ?>"name="ssbwpp_options[<?php echo esc_attr( $args['label_for'] ); ?>]">
	 <option value="arriba" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'arriba', false ) ) : ( '' ); ?>>Encima del contenido</option>
	 <option value="abajo" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], 'abajo', false ) ) : ( '' ); ?>>Debajo del contenido</option>
	 </select>
	 <?php
}
 
/**
 * top level menu
 */
function ssbwpp_options_page() {
	 // add top level menu page
	 add_menu_page(
		 'Social Share',
		 'Social Share Options',
		 'manage_options',
		 'ssbwpp',
		 'ssbwpp_options_page_html'
	 );
}
 
/**
 * register our ssbwpp_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'ssbwpp_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function ssbwpp_options_page_html() {
 	// check user capabilities
	 if ( ! current_user_can( 'manage_options' ) ) {
	 	return;
	 }
	 
	 // add error/update messages
	 
	 // check if the user have submitted the settings
	 // wordpress will add the "settings-updated" $_GET parameter to the url
	 if ( isset( $_GET['settings-updated'] ) ) {
		 // add settings saved message with the class of "updated"
		 add_settings_error( 'ssbwpp_messages', 'ssbwpp_message', __( 'Settings Saved', 'ssbwpp' ), 'updated' );
	 }
	 
	 // show error/update messages
	 settings_errors( 'ssbwpp_messages' );
	 ?>
		 <div class="wrap">
			 <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			 <form action="options.php" method="post">
		 <?php
			 // output security fields for the registered setting "ssbwpp"
			 settings_fields( 'ssbwpp' );
			 // output setting sections and their fields
			 // (sections are registered for "ssbwpp", each field is registered to a specific section)
			 do_settings_sections( 'ssbwpp' );
			 // output save settings button
			 submit_button( 'Save Settings' );
			 ?>
			 </form>
		</div>
	 <?php
}
```

Sustituir la function addButtons por

```php
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
		$options = get_option( 'ssbwpp_options' );
		if($options["ssbwpp_field_selector"] == 'arriba'){
			$content = $output.$content;
		}else{
			$content .=$output;
		}
	}
	return $content;
}
```



