<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package totspot
 */

get_header( 'error-404' ); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'totspot' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'This is SOOOO embarrassing. It looks like nothing was found at this location. Maybe try a search or <a href="http://totspotchildcare.com">start over</a>?', 'totspot' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>