<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GOBBLE
 */

/**
 * Assign the GOBBLE version to a var
 */
$theme            = wp_get_theme();
$gobble_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
 $content_width = 1280; /* pixels */
}

$jv = (object) array(
	'version' => $gobble_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-theme.php',
	'customizer' => require 'inc/customizer/class-customizer.php',
);

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Custom hooks that act independently of the theme templates.
 */
require get_template_directory() . '/inc/hooks.php';


/**
 * Load custom widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load custom shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Load Jetpack compatibility file.
 */
if ( class_exists( 'Jetpack' ) ) {
  //for development (remove for production)
  add_filter( 'jetpack_development_mode', '__return_true' );
	$jv->jetpack = require 'inc/jetpack/class-jetpack.php';
}

/**
 * Load tailor compatibility file.
 */
if ( class_exists( 'Tailor' ) ) {
	$jv->tailor = require 'inc/tailor/tailor.php';
}

/**
 * Load acf compatibility file.
 */
if ( class_exists( 'acf' ) ) {
	$jv->acf = require 'inc/acf/acf.php';
}
