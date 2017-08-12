<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="is-fullheight">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<?php bulmapress_skip_link_screen_reader_text(); ?>
		<header id="header" class="hero is-primary is-medium">
			<div class="hero-head">
				<div class="container">
                    <nav class="navbar is-transparent">
                        <div class="navbar-brand">
                            <a class="navbar-item" href="/">
                                <img class="vak-logo" src="<?php echo get_template_directory_uri() . "/"?>frontend/img/vaci-anime-klub-logo-uj-aranyok-500-opt.png" alt="Váci Anime Klub"/>
                            </a>

                            <div class="navbar-burger" data-target="navMenu">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                        <div class="navbar-menu" id="navMenu">
                            <div class="navbar-start">
                                <?php bulmapress_navigation(); ?>
                            </div>
                        </div>
                    </nav>
				</div><!-- .container -->
			</div><!-- .hero-head -->

			<?php if (is_front_page()): ?>
			<!-- Hero content: will be in the middle -->
			<div class="hero-body">
				<div class="container has-text-centered">
					<p class="title">
				  		Csatlakozzáááá, dik! :D
					</p>
					<p>
						<a href="/csatlakoznal" class="button is-large is-outlined is-white">Csatlakozz! :)</a>
					</p>
				</div>
			</div>
		<?php endif; ?>

		</header><!-- .hero -->

		<div id="content" class="site-content">
