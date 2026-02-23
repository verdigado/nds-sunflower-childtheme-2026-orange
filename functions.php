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
	$sunflower_theme_data    = wp_get_theme( get_option( 'template' ) );
	$sunflower_theme_version = $sunflower_theme_data->version;
	define( 'SUNFLOWER_CHILD_THEME_VERSION', $sunflower_theme_version );
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

/**
 * Add editor styles.
 */
function sunflower_child_theme_sunflower_setup() {
		add_editor_style( '/assets/css/editor-style.css' );
}

add_action( 'after_setup_theme', 'sunflower_child_theme_sunflower_setup', 10 );
