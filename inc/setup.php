<?php
/**
 * ================================================================
 * Meybell Framework
 * ----------------------------------------------------------------
 * File: setup.php
 *
 * Responsibility:
 * Registers the fundamental WordPress capabilities supported by
 * the theme.
 *
 * Guiding Principle:
 * Declare capabilities; do not implement behavior.
 *
 * This file declares what the theme can do. It does not load
 * assets, register navigation locations, configure the editor,
 * render templates, or contain business logic.
 *
 * Related Files:
 * - enqueue.php
 * - navigation.php
 * - editor.php
 *
 * @package Meybell
 * ================================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the theme's fundamental WordPress capabilities.
 *
 * @return void
 */
function mnco_theme_setup() {
	/*
	 * Allow WordPress to manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable featured images for posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Use modern HTML5 markup for WordPress-generated elements.
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

	/*
	 * Allow site owners to upload a flexible custom logo.
	 *
	 * These dimensions provide a suggested starting size rather
	 * than forcing the uploaded image into a fixed shape.
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	/*
	 * Make embedded media responsive to its container.
	 */
	add_theme_support( 'responsive-embeds' );

	/*
	 * Allow blocks to use wide and full-width alignment.
	 */
	add_theme_support( 'align-wide' );

	/*
	 * Add RSS feed links to the document head where appropriate.
	 */
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Load translations from the theme's languages directory.
	 */
	load_theme_textdomain(
		'meybell',
		get_template_directory() . '/languages'
	);
}

add_action( 'after_setup_theme', 'mnco_theme_setup' );
