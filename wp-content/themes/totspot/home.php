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
 * @package totspot
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">
				<div class="cta cta-mid col-md-4 col-sm-12">
					<h1>Our Classrooms</h1>
					<ul class="list-boxes multi-color">
						<li><a href="#">Infants & Toddlers</a></li>
						<li><a href="#">Two year-olds</a></li>
						<li><a href="#">Three year-olds</a></li>
						<li><a href="#">Pre-K / VPK</a></li>
					</ul>
				</div>

				<div class="cta cta-left col-md-3 col-md-offset-1 col-sm-12">
					<h1>Love, Learning,<br/>and Laughter</h1>
					<br/>
					<!-- <p class="lll">❤ ✎ ☺</p> -->
					<p>The Tot Spot Child Care Center is committed to the care of your child by providing a nurturing environment, based on a perfect combination of Love, Learning & Laughter.</p>
					<!--
<p>A low teacher-child ratio

A staff with training and credentials in early-childhood education

Curriculum based learning programs

Social learning spaces organized for creative and constructive play</p>
-->
					<div class="button-holder">
						<a href="../parents-info">
							<button type="button" class="btn btn-success btn-more">Learn More</button>
						</a>	
					</div>
				</div>
				<div class="cta cta-right col-md-3 col-md-offset-1 col-sm-12">
					<h1>About Tot Spot</h1>
					<p>The Tot Spot Child Care Center is committed to the care of your child by providing a nurturing environment, based on the simplest ingredient a human can provide: LOVE.  We are dedicated to providing an atmosphere of acceptance for your child where he or she can mature socially, emotionally, physically, and academically through his or her first years of life.</p>
					<div class="button-holder">
						<a href="../about-us">
							<button type="button" class="btn btn-success btn-more">Learn More</button>
						</a>	
					</div>					
				</div>
			</div><!-- .row -->
			<div class="row">
				<div class="parent cta cta-wide col-md-12">
					<h2>What Parents Say</h2>
<?php
			$args = array( 'post_type' => 'testimonials',
										 'posts_per_page' => 10,
										 'orderby' => 'position',
										 'order' => 'ASC' );
/*
			$args = array( 'post_type' => 'home',
										 'posts_per_page' => 6,
										 'meta_key'=>'position',
										 'orderby' => 'meta_value',
										 'order' => 'ASC' );
*/	 
			$loop = new WP_Query( $args );
			
/*
			$rows = count( get_fields('row') );
			
			echo $rows;
*/
			
			while ( $loop->have_posts() ) : $loop->the_post();
			
			$testimonial = get_the_content();
			$names = get_the_title();
			
			?>
			
			<div class="parent-testimonial">
				<p><?php echo $testimonial;?></p>
				<span>- <?php echo $names;?></span>
			</div><!-- .parent-testimonial -->
			<?php endwhile; ?>


				</div>
			</div><!-- .row -->
			<div class="row">
				<div class="upper-footer col-md-3">
					<a href="../vpk" class="link-cta cta-vpk">
						<span class="cta-img"></span>
						<h2>Now Enrolling VPK</h2>
						<p>Get on the Waiting List Today!</p>
					</a>
				</div>
				
				<div class="upper-footer col-md-3">
					<a href="../camp-action" class="link-cta cta-photobook">
						<span class="cta-img"></span>
						<h2>Camp Action</h2>
						<p>Doing Cool Stuff</p>
					</a>
				</div>
				
				<div class="upper-footer col-md-3">
					<a href="../contact-us" class="link-cta cta-visit">
						<span class="cta-img"></span>
						<h2>Visit Tot Spot</h2>
						<p>See for Yourself</p>
					</a>
				</div>
			</div><!-- .row -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
