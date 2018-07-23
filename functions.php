<?php
/**
 * Semicolons and Coffee functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Semicolons_and_Coffee
 */

if ( ! function_exists( 'httpswww_semicolonsandcoffee_com_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function httpswww_semicolonsandcoffee_com_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Semicolons and Coffee, use a find and replace
		 * to change 'semicolonsandcoffee' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'semicolonsandcoffee', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'semicolonsandcoffee' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'httpswww_semicolonsandcoffee_com_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'httpswww_semicolonsandcoffee_com_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function httpswww_semicolonsandcoffee_com_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'httpswww_semicolonsandcoffee_com_content_width', 640 );
}
add_action( 'after_setup_theme', 'httpswww_semicolonsandcoffee_com_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function httpswww_semicolonsandcoffee_com_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'semicolonsandcoffee' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'semicolonsandcoffee' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'httpswww_semicolonsandcoffee_com_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function httpswww_semicolonsandcoffee_com_scripts() {
	wp_enqueue_style( 'semicolonsandcoffee-style', get_stylesheet_uri() . '/css/style.css' );
    wp_enqueue_style( 'normalize', get_stylesheet_uri() . '/css/normalize.css' );
    wp_enqueue_style( 'bootstrap-css', '//stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css' );




	wp_enqueue_script( 'semicolonsandcoffee-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), '1', true );
    wp_enqueue_script( 'bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js', array(jQuery), '20151215', true );
    wp_enqueue_script( 'jQuery-3.3.1', '//code.jquery.com/jquery-3.3.1.slim.min.js', array(jQuery), '20151215', true );
    wp_enqueue_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array(jQuery), '20151215', true );


	wp_enqueue_script( 'semicolonsandcoffee-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'httpswww_semicolonsandcoffee_com_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function cptui_register_my_cpts() {

    /**
     * Post Type: Projects.
     */

    $labels = array(
        "name" => __( "Projects", "" ),
        "singular_name" => __( "project", "" ),
        "menu_name" => __( "My Projects", "" ),
        "all_items" => __( "All Projects", "" ),
        "add_new" => __( "Add Project", "" ),
        "add_new_item" => __( "Add New Project", "" ),
        "edit_item" => __( "Edit Project", "" ),
        "new_item" => __( "New Project", "" ),
        "view_item" => __( "View Project", "" ),
        "view_items" => __( "View Projects", "" ),
        "search_items" => __( "Search Projects", "" ),
        "not_found" => __( "No Projects Found", "" ),
        "not_found_in_trash" => __( "No Projects Found In Trash", "" ),
    );

    $args = array(
        "label" => __( "Projects", "" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => false,
        "rest_base" => "",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "project", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 2,
        "menu_icon" => "dashicons-art",
        "supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
    );

    register_post_type( "project", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );



function custom_shortcode_function($atts) {

    //SHORTCODE EXAMPLE -- [projects_shortcode totalposts="3" category="featured"]

// Taxonomy category shortcode
    extract(shortcode_atts(array(
        'class_name'    => 'cat-post',
        'totalposts'    => '-1',
        'category'      => '',
        'thumbnail'     => 'false',
        'excerpt'       => 'true',
        'orderby'       => 'post_date',
        'post_type'     => 'project'
    ), $atts));

    ?>


    <?php
    global $post;
    $args = array(
        'posts_per_page' => $totalposts,
        'orderby' => $orderby,
        'post_type' => 'project',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => array( $category)
            )
        ));

    $loop = NEW WP_Query($args);

    ?>
    <section class="the-projects">
        <div class="container">
            <div class="row">

                <?php

                if ( $loop->have_posts() ) {

                    while ( $loop->have_posts() ) : $loop->the_post();

                        $backgroundImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
                        ?>

                        <div class="column col-sm-4">
                            <div class="individual-project project-<?php echo the_ID(); ?>" style="background: url('<?php echo $backgroundImage[0]; ?>') no-repeat; background-size: cover;">
                                <div class="overlay-sec" style="background:rgba(0, 0, 0, 0.63);">
                                    <div class="the-title">
                                        <h3><?php $char_limit = 20; //character limit
                                            $title = the_title();
                                            if($title >= $char_limit){
                                                echo substr(strip_tags($title), 0, $char_limit) . '...';
                                            }
                                            ?>

                                        </h3>
                                    </div>

                                    <hr/>

                                    <div class="project-content">

                                        <p><?php $char_limit = 100; //character limit
                                            $content = get_post_meta( $post->ID, 'project_content', true );
                                            echo substr(strip_tags($content), 0, $char_limit); ?>...
                                        </p>

                                        <p>
                                            <?php echo get_post_meta( $post->ID, 'project_location', true ); ?>
                                            |
                                            <?php echo get_post_meta( $post->ID, 'project_date', true ); ?>
                                            |
                                            <?php echo get_post_meta( $post->ID, 'project_status', true ); ?>
                                        </p>

                                    </div>

                                    <div class="the-project-link">
                                        <a href="<?php echo the_permalink( $post->ID ); ?>">View Project</a>
                                    </div>
                                </div>

                            </div>

                            <br/>


                        </div>


                        <?php


                    endwhile;
                }

                ?>
            </div>
        </div>
    </section>
    <?php

//	add_shortcode('inventory-category', 'cat_func');
    ob_start ();
    /* this turns output buffering on */

    ?>

    <?php

    $response = ob_get_contents();

    ob_end_clean();
    echo $response;

}
add_shortcode('projects_shortcode', 'custom_shortcode_function');
