<?php
/**
 * Theme Customizer Functions
 *
 * @package Bulmapress
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bulmapress_customize_register( $wp_customize ) {
	$wp_customize->remove_section("colors");
 	$wp_customize->remove_section("background_image");

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
}
add_action( 'customize_register', 'bulmapress_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bulmapress_customize_preview_js() {
	wp_enqueue_script( 'bulmapress_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bulmapress_customize_preview_js' );
