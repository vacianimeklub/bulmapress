<?php
/**
 * Widget Functions
 *
 * @package Bulmapress
 */

// Add theme support for selective refresh for widgets.
add_theme_support( 'customize-selective-refresh-widgets' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bulmapress_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bulmapress' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bulmapress' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s column is-one-third">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title is-bold">',
		'after_title'   => '</h2>',
		) );

	register_sidebar(array(
	    'name' => esc_html__('Front page widget area', 'bulmapress'),
        'id' => 'frontpage-sidebar',
        'description' => esc_html__('Add widgets here to make them appear on the front page.', 'bulmapress'),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => '',
    ));
}
add_action( 'widgets_init', 'bulmapress_widgets_init' );
