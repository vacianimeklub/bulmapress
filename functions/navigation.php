<?php
/**
 * Navigation Functions
 *
 * @package Bulmapress
 */

// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'menu-1' => esc_html__( 'Primary', 'bulmapress' ),
	) );

// Bulmapress navigation
function bulmapress_navigation()
{
	wp_nav_menu( array(
		'theme_location'    => 'menu-1',
		'depth'             => 3,
		'container'         => 'div id="navigation"',
        'items_wrap'        => '%3$s',
		'walker'            => new bulmapress_navwalker(),
		)
	);
}
