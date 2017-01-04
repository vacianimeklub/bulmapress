<?php
/**
 * Template part for displaying content
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('section'); ?>>
	<div class="container">
		<header class="content">
			<?php if ( is_single() ) : ?>
				<?php bulmapress_the_title('is-1', FALSE); ?>
			<?php elseif ( 'page' === get_post_type() ) : ?>
				<?php bulmapress_the_title('is-2', FALSE); ?>
			<?php else : ?>
				<?php bulmapress_the_title('is-2'); ?>
			<?php endif; ?>
			<?php if ( 'post' === get_post_type() ) : ?>
				<div class="subtitle is-6">
					<?php bulmapress_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="content entry-content">
			<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses(
					__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bulmapress' ),
					array(
						'span' => array(
							'class' => array()
							)
						)
					),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				)
			);

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bulmapress' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->

			<footer class="content entry-footer">
				<?php bulmapress_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
