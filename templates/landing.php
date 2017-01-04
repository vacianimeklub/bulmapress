<?php
/**
 * Template name: Landing
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Scops_UX
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area landing">
	<main id="main" class="site-main" role="main">
		<div class="page has-text-centered">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</div>
		<?php 
		bulmapress_custom_query(array(
			'post_type' => 'post',
			'post_class'	=> 'posts',
			'section_title' => 'Recent Posts',
			'section_columns' => 3,
			'section_max_posts' => 3,
			'section_button_text' => 'See all Posts'
			)
		);
		bulmapress_custom_query(array(
			'post_type' => 'page',
			'post_class'	=> 'pages',
			'section_title' => 'Recent Pages',
			'section_columns' => 4,
			'section_max_posts' => 4
			)
		);
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
