<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package totspot
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy; 1989 - <?php echo date('Y');?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Tot Spot Childcare</a>&nbsp;&nbsp;<span class="glyphicon glyphicon-home"></span> 1715 Lake Pickett Road, Orlando, FL 32826&nbsp;&nbsp;<span class="glyphicon glyphicon-earphone"></span> (407) 658-9332
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
