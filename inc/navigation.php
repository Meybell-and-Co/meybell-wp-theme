<?php
/**
 * ================================================================
 * Meybell Framework
 * ----------------------------------------------------------------
 * File: navigation.php
 *
 * Responsibility:
 * Provides navigation-related functionality.
 *
 * Guiding Principle:
 * Navigation should be accessible before it is clever.
 *
 * This file registers menu locations and contains navigation-
 * specific helpers. It does not render the site header, control
 * general asset loading, or store site content.
 *
 * Related Files:
 * - setup.php
 * - template-functions.php
 * - header.php
 * - footer.php
 *
 * @package Meybell
 * ================================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers the navigation menu locations provided by the theme.
 *
 * @return void
 */
function mnco_register_navigation_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary Navigation', 'meybell' ),
			'footer'  => __( 'Footer Navigation', 'meybell' ),
		)
	);
}

add_action( 'after_setup_theme', 'mnco_register_navigation_menus' );
