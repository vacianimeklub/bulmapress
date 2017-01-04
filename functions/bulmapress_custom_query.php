<?php
/**
 * Custom Query Function
 *
 *
 * @package Bulmapress
 */

function bulmapress_custom_query($args = array())
{
	$post_type = $args['post_type'] ? $args['post_type'] : 'post';
	$post_class = $args['post_class'] ? $args['post_class'] : 'posts';
	$section_title = $args['section_title'] ? $args['section_title'] : 'Recent Posts';
	$section_columns = $args['section_columns'] ? $args['section_columns'] : 3;
	$section_max_posts = $args['section_max_posts'] ? $args['section_max_posts'] : 3;
	$section_button_text = $args['section_button_text'] ? $args['section_button_text'] : 'See all Posts';

	if ($section_max_posts == 0 || $section_max_posts == 1) {
		$section_max_posts = 1;
	}
	$query_args = array(
		'post_type' => $post_type,
		'posts_per_page' => $section_max_posts,
		'ignore_sticky_posts' => true
		);
	$the_query = new WP_Query( $query_args );
	$post_count = $the_query->found_posts;

	switch ($section_columns) {
		case 1:
			$section_columns = 'is-full';
			break;
		case 2:
			$section_columns = 'is-half';
			break;
		case 3:
			$section_columns = 'is-one-third';
			break;
		case 4:
			$section_columns = 'is-one-quarter';
			break;
		case 6:
			$section_columns = 'is-2';
			break;

		default:
			$section_columns = 'is-one-third';
			break;
	}
	if ($post_class == '') {
		$bulmapress_post_class = $post_type;
	} else {
		$bulmapress_post_class = $post_class;
	}

	$output = '<div class="'.$bulmapress_post_class.'">';
	if ( $the_query->have_posts() ) {
		$output.= '<div class="section">';
			$output.= '<div class="container">';
				$output.= '<h2 class="title is-2 has-text-centered">'.ucwords($section_title).'</h2>';
				$output.= '<div class="spacer"></div>';
				$output.= '<div class="columns is-multiline">';
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$output.= '<div class="column '.$section_columns.'">';
							$output.= '<div class="card '.implode(' ', get_post_class()).'">';
								if ( has_post_thumbnail() ) {
									ob_start();
									the_post_thumbnail('widget');
									$ob_thumbnail = ob_get_contents();
									ob_end_clean();
									$output.= '<div class="card-image">';
										$output.= '<figure class="image is-4by3">';
											$output.= $ob_thumbnail;
										$output.= '</figure>';
									$output.= '</div>';
								}
								$output.= '<div class="card-content">';
									$output.= '<div class="media">';
										$output.= '<div class="media-content">';
											ob_start();
											bulmapress_the_title('is-5');
											$ob_title = ob_get_contents();
											ob_end_clean();
											$output.= $ob_title;
										$output.= '</div>';
									$output.= '</div>';
									$output.= '<div class="content">';
										$output.= '<div class="">'.get_the_excerpt().'</div>';
									$output.= '</div>';
								$output.= '</div>';

							$output.= '</div>';
						$output.= '</div>';
					endwhile;
				wp_reset_postdata();
			$output.= '</div>';
			$output.= '<div class="spacer"></div>';
			$output.= '<div class="level is-h-centered">';
				$output.= '<p class="text">';
					if ( $post_type != 'page' ) {
						$buttom_classes = 'button is-info is-medium is-outlined';
						$button_href = get_post_type_archive_link( $post_type );
						$button_text = $section_button_text;
						$output.= '<a class="'.$buttom_classes.'" href="'.$button_href.'">'.$button_text.'</a>';
					}
				$output.= '</p>';
			$output.= '</div>';
		$output.= '</div>';
	$output.= '</div>';
	}
	$output.= '</div>';

	echo $output;
}
