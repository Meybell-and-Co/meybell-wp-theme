<?php

/**
 * ================================================================
 * Meybell Framework
 * ----------------------------------------------------------------
 * File: enqueue.php
 *
 * Responsibility:
 * Registers and enqueues the theme's front-end assets.
 *
 *
 * Guiding Principle:
 * Load only the assets required for the current request.
 *
 * This file is responsible for stylesheets, JavaScript,
 * asset versioning, and loading dependencies through the
 * WordPress enqueue system.
 *
 * Related Files:
 * - setup.php
 * - editor.php
 *
 * @package meybell-framework
 * ================================================================
 */

if (! defined('ABSPATH')) {
	exit;
}

/**
 * Enqueues the theme's front-end assets.
 *
 * @return void
 */

function mnco_enqueue_assets()
{

	wp_enqueue_style(
		'mnco-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get('Version')
	);
}

add_action('wp_enqueue_scripts', 'mnco_enqueue_assets');
