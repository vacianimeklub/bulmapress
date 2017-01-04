<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bulmapress
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/content', 'post' ); ?>
			<div class="section">
				<div class="container is-narrow">
					<?php the_post_navigation();?>
				</div>
			</div>
			<?php bulmapress_get_comments(); ?>
		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
