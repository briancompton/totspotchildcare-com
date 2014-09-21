<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package ts_maintenance
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function ts_maintenance_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'ts_maintenance_jetpack_setup' );
