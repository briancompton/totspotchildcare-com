<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package totspot
 */
?>
	<div id="submenu-holder" class="widget-area col-md-4 col-md-offset-1" role="complementary">

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="submenu" class="widget">
				<?php wp_nav_menu( array( 'theme_location' => 'submenu', 'menu_class'      => 'menu menu-sub', ) ); ?>
			</aside>
			
			<aside>
				<h2 class="btn btn-info schedule-tour">Schedule a Tour</h2>
				<?php echo do_shortcode( '[contact-form-7 id="6" title="Contact form 1"]' ); ?>
			</aside>

	</div><!-- #secondary -->
