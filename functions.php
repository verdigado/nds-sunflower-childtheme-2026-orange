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

require_once 'functions/update.php';

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
 * Un-register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sunflower_child_widgets_init() {
	unregister_sidebar( 'sidebar-1' );
}

add_action( 'widgets_init', 'sunflower_child_widgets_init', 99 );


/**
 * Remove sunflower_header_layout as we only support personal header layout in the child theme.
 */
function sunflower_child_remove_parent_setting_field() {
	$page    = 'sunflower-setting-admin';
	$section = 'sunflower_layout';
	$field   = 'sunflower_header_layout';

	global $wp_settings_fields;
	if ( isset( $wp_settings_fields[ $page ][ $section ][ $field ] ) ) {
		unset( $wp_settings_fields[ $page ][ $section ][ $field ] );
	}
}
add_action( 'admin_init', 'sunflower_child_remove_parent_setting_field', 20 );
