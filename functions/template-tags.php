<?php
/**
 * Custom Template Tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bulmapress
 */

if ( ! function_exists( 'bulmapress_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function bulmapress_posted_on() {
	$posted_dt = DateTime::createFromFormat('Y-m-d\TH:i:sT', get_the_date( 'c' ));
	$modified_dt = DateTime::createFromFormat('Y-m-d\TH:i:sT', get_the_modified_date( 'c' ));

	$diff = date_diff($posted_dt, $modified_dt, true);

	$time_string = sprintf('<time class="entry-date published" datetime="%1$s">%2$s</time>', esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ));

	$modification_time_string = sprintf('<time class="entry-date updated" datetime="%1$s">%2$s</time>', esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() ));

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'bulmapress' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$modified_on = sprintf(
		esc_html_x( 'Modified on %s', 'modification date', 'bulmapress' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $modification_time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'Posted by %s', 'post author', 'bulmapress' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><br />';
	if ($diff->d > 3) {
		echo '<span class="modified-on">' . $modified_on . '</span><br />';
	}

	echo '<span class="byline"> ' . $byline . '</span>';
}
endif;

if ( ! function_exists( 'bulmapress_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function bulmapress_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( '<span class="tag is-light">', '</span><span class="tag is-light">', '</span>' );
		if ( $categories_list && bulmapress_categorized_blog() ) {
			printf( '<span class="tags cat-links">' . esc_html__( 'Posted in %1$s', 'bulmapress' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '<span class="tag is-light">', '</span><span class="tag is-light">', '</span>' );
		if ( $tags_list ) {
			printf( '<br /><span class="tags tags-links">' . esc_html__( 'Tagged %1$s', 'bulmapress' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<br /> <span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment on %s', 'bulmapress' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'bulmapress' ),
			get_the_title()
		),
		'<br /> <span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function bulmapress_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bulmapress_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bulmapress_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bulmapress_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bulmapress_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in bulmapress_categorized_blog.
 */
function bulmapress_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'bulmapress_categories' );
}
add_action( 'edit_category', 'bulmapress_category_transient_flusher' );
add_action( 'save_post',     'bulmapress_category_transient_flusher' );
