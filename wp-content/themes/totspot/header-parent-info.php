<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package totspot
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( is_front_page() ) { iamb_home_page_banner(); } ?>
<div id="page" class="hfeed site container">
	
	<header id="masthead" class="site-header" role="banner">
		<?php // if ( is_front_page() ) { iamb_home_page_banner(); } ?>
		<div class="row header-row">
			<div class="site-branding col-md-3">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/img/ts-logo-final.png" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
			<!-- <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2> -->
			<!--
<a href="25-years">
				<img class="anniversary" src="<?php echo get_template_directory_uri(); ?>/img/spot-25-years.png" alt="Tot Spot - 25 Years of Love, Learning, and Laughter">
			</a>
-->
		</div>

		<nav id="site-navigation" class="main-navigation col-md-9" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'totspot' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'totspot' ); ?></a>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class'      => 'menu menu-primary pull-right', ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="hero col-md-9">
			<img src="<?php echo get_template_directory_uri(); ?>/img/hero-inside.png" alt="Tot Spot Child Care Orlando">
		</div>
		</div><!-- .row -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
