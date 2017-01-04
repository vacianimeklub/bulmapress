<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
	<?php if ( has_post_thumbnail() ): ?>
		<div class="card-image">
			<figure class="image is-16by9">
				<?php if ( is_single() ) : ?>
					<?php the_post_thumbnail(); ?>
				<?php else : ?>
					<?php the_post_thumbnail('widget'); ?>
				<?php endif; ?>
			</figure>
		</div>
	<?php endif; ?>
	<div class="card-content">
		<div class="media">
			<header class="media-content">
				<?php if ( is_single() ) : ?>
					<?php bulmapress_the_title('is-2', false); ?>
				<?php else : ?>
					<?php bulmapress_the_title('is-3'); ?>
				<?php endif; ?>

				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="subtitle is-6">
						<?php bulmapress_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		</div>
		<div class="content entry-content">
		<?php if ( is_single() ) : ?>
			<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bulmapress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bulmapress' ),
				'after'  => '</div>',
				) );
				?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<div class="content entry-footer">
			<small><?php bulmapress_entry_footer(); ?></small>
		</div><!-- .entry-footer -->
	</div><!-- .entry-content -->
</div>

</article><!-- #post-## -->
