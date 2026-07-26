<?php
/**
 * ================================================================
 * Meybell Framework
 * ----------------------------------------------------------------
 * File: setup.php
 *
 * Responsibility:
 * Registers the WordPress capabilities supported by the theme.
 *
 * Guiding Principle:
 * Declare capabilities, don't implement behavior.
 *
 * This file declares what the theme can do. It does not load
 * assets, render templates, or contain business logic.
 *
 * Related Files:
 * - enqueue.php
 * - navigation.php
 * - editor.php
 *
 * @package Meybell
 * ================================================================
 */
<?php
/**
 * Theme setup and capability registration.
 *
 * This file declares the WordPress features supported by the
 * Meybell Framework theme. It does not enqueue assets, render
 * templates, or implement business logic.
 *
 * @package Meybell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers theme support and core WordPress capabilities.
 *
 * @return void
 */
function mnco_theme_setup() {

	/**
	 * Let WordPress manage the document <title>.
	 */
	add_theme_support( 'title-tag' );

	/**
	 * Enable Featured Images.
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Enable support for HTML5 markup.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	/**
	 * Enable support for custom logos.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 200,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/**
	 * Enable responsive embedded content.
	 */
	add_theme_support( 'responsive-embeds' );

	/**
	 * Enable wide and full-width block alignment.
	 */
	add_theme_support( 'align-wide' );

	/**
	 * Load editor styles so the block editor
	 * more closely reflects the front-end.
	 */
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );

	/**
	 * Register navigation menu locations.
	 */
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'meybell' ),
			'footer'  => __( 'Footer Navigation', 'meybell' ),
		)
	);

	/**
	 * Load the theme text domain for translations.
	 */
	load_theme_textdomain(
		'meybell',
		get_template_directory() . '/languages'
	);
}

add_action( 'after_setup_theme', 'mnco_theme_setup' );
