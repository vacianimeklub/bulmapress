<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bulmapress
 */
get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<div class="container">
				<header class="page-header wrapper">
					<h1 class="title is-3 page-title">
						<?php printf( esc_html__( 'Search Results for: %s', 'bulmapress' ), '<span>' . get_search_query() . '</span>' ); ?>
					</h1>
				</header><!-- .page-header -->
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
				<?php endwhile; ?>
				<?php the_posts_navigation(); ?>
			</div>
		<?php else: ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
