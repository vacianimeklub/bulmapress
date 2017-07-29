<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bulma
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main wrapper" role="main">
		<div class="container">
			<div class="columns">
				<div class="column tile is-ancestor">
					<div class="tile is-vertical is-parent is-6">
						<div class="tile is-child notification is-primary">
							<h2 class="title">Események</h2>
						</div>
						<div class="tile is-child notification is-warning">
							<h2 class="title">Cikkek</h2>
						</div>
					</div>
					<div class="tile is-vertical is-parent is-6">
						<div class="tile is-child notification is-danger">
							<h2 class="title">VAKstars</h2>
						</div>
						<div class="tile is-child notification is-success">
							<h2 class="title">Galléria</h2>			
						</div>
					</div>
				</div>	
			</div>
		</div>




		<?php if ( have_posts() ) : ?>
			<div class="container">
				<div class="columns is-multiline">
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="column is-one-third">
							<?php get_template_part( 'template-parts/content', 'post' ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="section pagination">
				<div class="container">
					<?php the_posts_pagination(); ?>
				</div>
			</div>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
