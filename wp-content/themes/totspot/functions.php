<?php
/**
 * totspot functions and definitions
 *
 * @package totspot
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'totspot_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function totspot_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on totspot, use a find and replace
	 * to change 'totspot' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'totspot', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'totspot' ),
		'submenu' => __( 'Sub Menu', 'totspot' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'totspot_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // totspot_setup
add_action( 'after_setup_theme', 'totspot_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function totspot_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'totspot' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'totspot_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function totspot_scripts() {
	wp_enqueue_style( 'totspot-style', get_stylesheet_uri() );

	wp_enqueue_script( 'totspot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'totspot-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'totspot_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';




/**
 * Enable jQuery and Bootstrap
 */

function iamb_inc_bootstrap() {

	wp_register_script(
		'js_bootstrap',
		get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
		array('jquery'),
		true
	);
	
	wp_register_script(
		'js_iamb',
		get_template_directory_uri() . '/js/site.js',
		array('jquery')
	);
	

	wp_enqueue_script('js_bootstrap');
	wp_enqueue_script('js_iamb');	
}
add_action('wp_enqueue_scripts', 'iamb_inc_bootstrap');

/** 
* Get the CSS
*/

function iamb_inc_admin_styles() {
	
	wp_register_style('css_iamb_admin',
	get_template_directory_uri() . '/css/admin.css',
	array(),
	'all'
	);
	wp_enqueue_style('css_iamb_admin');
	
}
add_action( 'admin_enqueue_scripts', 'iamb_inc_admin_styles' );

function iamb_inc_styles() {
	
	wp_register_style('css_bootstrap',
	get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css',
	array(),
	'all'
	);
	wp_enqueue_style('css_bootstrap');
	
	wp_register_style('css_iamb',
	get_template_directory_uri() . '/css/site.css',
	array()
	);
	wp_enqueue_style('css_iamb');
		
}
add_action( 'wp_enqueue_scripts', 'iamb_inc_styles', 99);

/* Change Admin Footer */
add_filter('admin_footer_text', 'remove_footer_admin'); 
function remove_footer_admin () {
echo "&copy; " .  date('Y') . " " . get_bloginfo('name') . ". Need assistance? Contact Brian Compton at <a href='mailto:brian@icompton.com'>brian@icompton.com</a> or (407) 341-1352.";
}

/* Customize the login page */

	// Inject stylesheet to customize the login page
	function custom_login_logo() {
			echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/css/admin.css">';
	}
	add_action('login_head', 'custom_login_logo');


	// changing the login page URL
    function put_my_url(){
    return ( get_bloginfo( 'url' ) ); // putting my URL in place of the WordPress one
    }
    add_filter('login_headerurl', 'put_my_url');

	// changing the login page URL hover text
    function put_my_title(){
    return ( get_bloginfo( 'title' ) ); // changing the title from "Powered by WordPress" to whatever you wish
    }
    add_filter('login_headertitle', 'put_my_title');


/* Add favicon and apple touch icons */

		// Set the favicon
		function blog_favicon() {
			echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/favicon.ico" />';
		}
		add_action('wp_head', 'blog_favicon');
		add_action('admin_head', 'blog_favicon');
		
		// Set the Apple Touch icons
		function iamb_touch_icons() {
			echo '<link rel="apple-touch-icon" href="' . get_template_directory_uri() . '/img/touch-icon-iphone.png" />';
			echo '<link rel="apple-touch-icon" sizes="72x72" href="' . get_template_directory_uri() . '/img/touch-icon-ipad.png" />';
			echo '<link rel="apple-touch-icon" sizes="114x114" href="' . get_template_directory_uri() . '/img/touch-icon-iphone-retina.png" />';
			echo '<link rel="apple-touch-icon" sizes="144x144" href="' . get_template_directory_uri() . '/img/touch-icon-ipad-retina.png" />';
		}
		add_action('wp_head', 'iamb_touch_icons');
		add_action('admin_head', 'iamb_touch_icons');

// Include the Google Analytics Tracking Code (ga.js)

function google_analytics_tracking_code(){

	$propertyID = 'UA-49219108-1'; // GA Property ID

	if ($options['ga_enable']) { ?>

		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '<?php echo $propertyID; ?>']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>

<?php }
}

// include GA tracking code before the closing head tag
add_action('wp_head', 'google_analytics_tracking_code');


// Add custom post types
add_action( 'init', 'create_post_type' );
function create_post_type() {
	
/*
	register_post_type( 'home',
		array(
			'menu_position' => 5, // places menu item directly below Posts
			'menu_icon' => '',
			'labels' => array(
				'name' => __( 'Home', 'totspot' ),
				'singular_name' => __( 'Home', 'totspot' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'home'),
		)
	);
	
*/
	/*
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
*/

/*
	register_post_type( 'calltoaction',
		array(
			'menu_position' => 7, // places menu item directly below Posts
			'menu_icon' => '',
			'labels' => array(
				'name' => __( 'Call to Action', 'totspot' )
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'cta'),
		)
	);
*/
	
	/*
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
*/
	

	
}

// register a custom post type called 'banner'
/*
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
*/

// Style admin icons for custom post types
function add_menu_icons_styles(){
?>
<style>
/*
#adminmenu .menu-icon-home div.wp-menu-image:before {
  content: "\f102";
}
*/
/*
#adminmenu .menu-icon-faqs div.wp-menu-image:before {
  content: "\f223";
}

#adminmenu .menu-icon-testimonials div.wp-menu-image:before {
  content: "\f307";
}

#adminmenu .menu-icon-banner div.wp-menu-image:before {
  content: "\f488";
}
*/

#adminmenu .menu-icon-calltoaction div.wp-menu-image:before {
  content: "\f101";
}

</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );

// Add Google Web Font
/*
function iamb_add_gwebfont() {      
            wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Merriweather:400,400italic');
            wp_enqueue_style( 'googleFonts');
        }
    
    add_action('wp_print_styles', 'iamb_add_gwebfont');
*/

// Remove version generator from head
function iamb_wp_version() {
     return '';
}
add_filter('the_generator', 'iamb_wp_version');

// Remove admin menus
function remove_menus(){
  
//  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
//  remove_menu_page( 'upload.php' );                 //Media
//  remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
//  remove_menu_page( 'themes.php' );                 //Appearance
//  remove_menu_page( 'plugins.php' );                //Plugins
//  remove_menu_page( 'users.php' );                  //Users
//  remove_menu_page( 'tools.php' );                  //Tools
//  remove_menu_page( 'options-general.php' );        //Settings
  
}
add_action( 'admin_menu', 'remove_menus' );
?>
