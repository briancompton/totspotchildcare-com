<?php 
    /*
    Plugin Name: IAMB FAQs
    Plugin URI: http://www.iambriancompton.com/
    Description: Plugin for displaying frequently asked questions and the corresponding answers.
    Author: Brian W. Compton
    Version: 1.0
    Author URI: http://www.iambriancompton.com
    */

// Add custom post types
add_action( 'init', 'create_post_type_faqs' );
function create_post_type_faqs() {
	
	
	register_post_type( 'faqs',
		array(
			'menu_position' => 6, // places menu item directly below Posts
			'menu_icon' => '',
			'labels' => array(
				'name' => __( 'FAQs', 'totspot' ),
				'singular_name' => __( 'FAQ', 'totspot' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'faqs'),
		)
	);
	

	
}

// Style admin icons for custom post types
function add_menu_icons_styles_faqs(){
?>
<style>
#adminmenu .menu-icon-faqs div.wp-menu-image:before {
  content: "\f223";
}

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles_faqs' );


?>