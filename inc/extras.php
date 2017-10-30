<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package GOBBLE
 */


 // STYLE DIRECTORY

 define(STYLEDIR, get_stylesheet_directory_uri());

 // Callback function to insert 'styleselect' into the $buttons array
function sfhs_tinymce_buttons( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'sfhs_tinymce_buttons');

// Callback function to filter the MCE settings
function sfhs_tinymce_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'Button',
			'selector' => 'a',
			'classes' => 'btn btn-alt'
		),
    array(
			'title' => 'Button White Border',
			'selector' => 'a',
			'classes' => 'btn'
		)
	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'sfhs_tinymce_formats' );
