<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bulmapress
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('box'); ?>>
    <header>
        <?php if ( is_single() ) : ?>
            <?php bulmapress_the_title('is-2', false); ?>
        <?php else : ?>
            <?php bulmapress_the_title('is-3'); ?>
        <?php endif; ?>

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="posted-on is-6">
                <?php bulmapress_posted_on(); ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
    <div class="content entry-content">
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
        <div class="content entry-footer">
            <small><?php bulmapress_entry_footer(); ?></small>
        </div><!-- .entry-footer -->
    </div><!-- .entry-content -->
</article><!-- #post-## -->
