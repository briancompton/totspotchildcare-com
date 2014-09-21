<?php 
    /*
    Plugin Name: IAMB Testimonials
    Plugin URI: http://www.iambriancompton.com/
    Description: Plugin for displaying client testimonials
    Author: Brian W. Compton
    Version: 1.0
    Author URI: http://www.iambriancompton.com
    */

// Add custom post types
add_action( 'init', 'create_post_type_testimonials' );
function create_post_type_testimonials() {
	
	
	register_post_type( 'testimonials',
		array(
			'menu_position' => 8, // places menu item directly below Posts
			'menu_icon' => '',
			'labels' => array(
				'name' => __( 'Testimonials', 'totspot' ),
				'singular_name' => __( 'Testimonials', 'totspot' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'testimonials'),
		)
	);
	

	
}

// Style admin icons for custom post types
function add_menu_icons_styles_testimonials(){
?>
<style>

#adminmenu .menu-icon-testimonials div.wp-menu-image:before {
  content: "\f307";
}

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles_testimonials' );


?>