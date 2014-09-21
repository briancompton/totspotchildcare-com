<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ts_maintenance
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="maint-img">
				<img src="<?php echo get_template_directory_uri(); ?>/img/ts-maintenance.png" alt="Tot Spot Child Care Orlando">	
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
