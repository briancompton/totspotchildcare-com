<?php 
    /*
    Plugin Name: IAMB Page Banner
    Plugin URI: http://www.iambriancompton.com/
    Description: Plugin for displaying banner on home page
    Author: Brian W. Compton
    Version: 1.0
    Author URI: http://www.iambriancompton.com
    */

// register a custom post type called 'banner'
function iamb_create_post_type() {
    $labels = array(
        'name' => __( 'Banners' ),
        'singular_name' => __( 'banner' ),
        'add_new' => __( 'New banner' ),
        'add_new_item' => __( 'Add New banner' ),
        'edit_item' => __( 'Edit banner' ),
        'new_item' => __( 'New banner' ),
        'view_item' => __( 'View banner' ),
        'search_items' => __( 'Search banners' ),
        'not_found' =>  __( 'No banners Found' ),
        'not_found_in_trash' => __( 'No banners found in Trash' ),
    );
    $args = array(
        'menu_position' => 5, // places menu item directly below Posts
		'menu_icon' => '',
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'posts_per_page' => 1,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'custom-fields',
            'thumbnail',
            'page-attributes'
        ),
        'taxonomies' => array( 'category' ),
    );
    register_post_type( 'banner', $args );
}
add_action( 'init', 'iamb_create_post_type' );

// function to show home page banner using query of banner post type
function iamb_home_page_banner() {
 
    // start by setting up the query
    $query = new WP_Query( array(
        'post_type' => 'banner',
        'category_name' => 'show'
    ));
 
    // now check if the query has posts and if so, output their content in a banner-box div
    if ( $query->have_posts() ) { 
    ?>
        
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <!-- <div id="post-<?php the_ID(); ?>" <?php post_class( 'banner' ); ?>><?php the_content(); ?></div> -->
            <div class="banner-box alert alert-success alert-dismissable container <?php post_class( 'banner' ); ?>">
            	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            	<?php the_content(); ?>
            </div>
            <?php endwhile; ?>
        
    <?php }
    wp_reset_postdata();
 
}


// Style admin icons for custom post types
function add_menu_icons_styles_banner(){
?>
<style>
#adminmenu .menu-icon-banner div.wp-menu-image:before {
  content: "\f488";
}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles_banner' );
?>