<?php
/**
 * Child Theme Configurator functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Child_Theme_Configurator
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SUNFLOWER_CHILD_THEME_VERSION' ) ) {
	$sunflower_childtheme_version = wp_get_theme()->get( 'Version' );
	define( 'SUNFLOWER_CHILD_THEME_VERSION', $sunflower_childtheme_version );
}


if ( ! function_exists( 'sunflower_child_theme_configurator_css' ) ) :
	/**
	 * Enqueue child theme styles.
	 */
	function sunflower_child_theme_configurator_css() {
		wp_enqueue_style(
			'sunflower_child_theme_configurator_css',
			trailingslashit( get_stylesheet_directory_uri() ) . 'style.css',
			array( 'sunflower-style' ),
			SUNFLOWER_CHILD_THEME_VERSION
		);
	}
endif;
add_action( 'wp_enqueue_scripts', 'sunflower_child_theme_configurator_css', 10 );

require_once 'functions/block-patterns.php';
