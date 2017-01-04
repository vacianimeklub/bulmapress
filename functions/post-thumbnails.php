<?php
/**
 * Post Thumbnails Functions
 *
 * @package Bulmapress
 */


/**
 *
 * Enable support for Post Thumbnails on posts and pages.
 *
 * NOTE: If you edit or add new image sizes, please regenerate your thumbnails to see changes.
 *
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 */
add_theme_support( 'post-thumbnails' );

add_image_size( 'widget', '400', '300', $crop = true );
