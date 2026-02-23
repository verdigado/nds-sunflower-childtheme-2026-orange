<?php
/**
 * Block patterns registration.
 *
 * @link https://developer.wordpress.org/themes/functionality/child-themes/#enqueueing-stylesheets
 *
 * @package Child_Theme_Configurator
 */

/**
 * Block patterns registration.
 */
$sunflower_dirs = glob( get_stylesheet_directory() . '/functions/block-patterns/*', GLOB_ONLYDIR );

foreach ( $sunflower_dirs as $sunflower_dir ) {
	$sunflower_basename_dir = basename( $sunflower_dir );

	register_block_pattern_category(
		'hvba-nds-' . $sunflower_basename_dir,
		array( 'label' => esc_html__( 'NDS', 'default' ) . '-' . ucfirst( $sunflower_basename_dir ) )
	);

	$sunflower_files = glob( $sunflower_basename_dir . '/*.html' );
	foreach ( $sunflower_files as $sunflower_file ) {
		$sunflower_basename_file = basename( $sunflower_file, '.html' );

		register_block_pattern(
			'nds-sunflower-childtheme-2026-orange/' . $sunflower_basename_file,
			array(
				'title'      => ucfirst( $sunflower_basename_file ),
				'categories' => array( 'hvba-nds-' . $sunflower_basename_dir ),
				'content'    => wp_remote_get( $sunflower_file ),
			)
		);
	}
}
