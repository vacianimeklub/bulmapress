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
                <div class="column">
                    <?php if ( is_active_sidebar( 'frontpage-sidebar' ) ) : ?>
                        <div id="front-page-widgets" >
                            <?php dynamic_sidebar( 'frontpage-sidebar' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
