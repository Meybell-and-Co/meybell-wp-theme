<?php
/**
 * ================================================================
 * Meybell Framework
 * ----------------------------------------------------------------
 * File: editor.php
 *
 * Responsibility:
 * Provides Block Editor integration and editor-specific behavior.
 *
 * Guiding Principle:
 * The editor should resemble the front end whenever practical.
 *
 * This file enables editor features and styles so that content
 * creators experience a workspace that closely reflects the
 * published website.
 *
 * Related Files:
 * - setup.php
 * - enqueue.php
 * - theme.json
 *
 * @package Meybell
 * ================================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configures the WordPress Block Editor.
 *
 * @return void
 */
function mnco_configure_editor() {

	/**
 * Editor Styles
 *
 * Load the primary framework stylesheet inside
 * the Block Editor so content more closely reflects
 * the published experience.
 */
	add_theme_support( 'editor-styles' );

	add_editor_style( 'assets/css/main.css' );
}

add_action( 'after_setup_theme', 'mnco_configure_editor' );
