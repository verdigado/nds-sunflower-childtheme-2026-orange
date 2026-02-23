<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'sunflower-style','sunflower-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

require_once 'functions/block-patterns.php';

function child_theme_sunflower_setup() {
		add_editor_style( '/assets/css/editor-style.css' );
}

add_action( 'after_setup_theme', 'child_theme_sunflower_setup',10 );
