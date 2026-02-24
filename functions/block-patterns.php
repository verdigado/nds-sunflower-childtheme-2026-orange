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
		'nds-' . $sunflower_basename_dir,
		array( 'label' => esc_html__( 'NDS', 'default' ) . '-' . ucfirst( $sunflower_basename_dir ) )
	);

	$sunflower_files = glob( $sunflower_dir . '/*.html' );
	foreach ( $sunflower_files as $sunflower_file ) {
		$sunflower_basename_files = basename( $sunflower_file, '.html' );

		register_block_pattern(
			'nds-sunflower-childtheme-2026-orange/' . $sunflower_basename_files,
			array(
				'title'      => ucfirst( $sunflower_basename_files ),
				'categories' => array( 'nds-' . $sunflower_basename_dir ),
				// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents
				'content'    => file_get_contents( $sunflower_file ),
			)
		);
	}
}
