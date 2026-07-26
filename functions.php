<?php
/**
 * Meybell WordPress Theme bootstrap.
 *
 * Loads the theme's modular functionality.
 *
 * @package Meybell
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/navigation.php';
require_once get_template_directory() . '/inc/editor.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/demo-mode.php';
