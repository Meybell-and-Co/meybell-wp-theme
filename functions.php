<?php
/**
 * Core theme setup and functionality.
 *
 * @package Meybell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure the theme after WordPress has loaded it.
 */
function meybell_setup() {

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable featured images for posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Use modern HTML5 markup for common WordPress components.
	 */
	add_theme_support(
		'html5',
		array(
			'caption',
			'comment-form',
			'comment-list',
			'gallery',
			'search-form',
			'script',
			'style',
		)
	);

	/*
	 * Improve compatibility with the block editor.
	 */
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );

	/*
	 * Load our front-end stylesheet inside the block editor.
	 */
	add_editor_style( 'assets/css/main.css' );

	/*
	 * Allow a logo to be managed through WordPress.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'               => 160,
			'width'                => 320,
			'flex-height'          => true,
			'flex-width'           => true,
			'unlink-homepage-logo' => true,
		)
	);

	/*
	 * Register reusable navigation locations.
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'meybell' ),
			'footer'  => __( 'Footer Navigation', 'meybell' ),
		)
	);
}
add_action( 'after_setup_theme', 'meybell_setup' );

/**
 * Return a cache-busting version for a theme asset.
 *
 * During development, file modification times ensure browsers receive
 * updated CSS and JavaScript instead of stale cached copies.
 *
 * @param string $relative_path File path relative to the theme root.
 * @return string
 */
function meybell_asset_version( $relative_path ) {
	$absolute_path = get_theme_file_path( $relative_path );

	if ( file_exists( $absolute_path ) ) {
		return (string) filemtime( $absolute_path );
	}

	return (string) wp_get_theme()->get( 'Version' );
}

/**
 * Load public-facing theme styles and scripts.
 */
function meybell_enqueue_assets() {

	wp_enqueue_style(
		'meybell-main',
		get_theme_file_uri( 'assets/css/main.css' ),
		array(),
		meybell_asset_version( 'assets/css/main.css' )
	);

	wp_enqueue_script(
		'meybell-main',
		get_theme_file_uri( 'assets/js/main.js' ),
		array(),
		meybell_asset_version( 'assets/js/main.js' ),
		array(
			'strategy'  => 'defer',
			'in_footer' => true,
		)
	);
}
add_action( 'wp_enqueue_scripts', 'meybell_enqueue_assets' );