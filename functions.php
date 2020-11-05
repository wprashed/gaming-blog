<?php

/**
 * maggie Blog & Magazine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package maggie_Blog_&_Magazine
 */

// Require Files

//require_once( get_theme_file_path( "/options/opt-config.php" ) );
//require_once( get_theme_file_path( "/inc/mb/metabox.php" ) );
//require_once( get_theme_file_path( "/inc/tgm.php" ) );


// Content Wide

if ( ! isset( $content_width ) ) $content_width = 1140;

// Theme Support

function maggie_theme_setup() {
    load_theme_textdomain( "maggie", get_theme_file_path("/languages") );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "automatic-feed-links");
    add_theme_support( "custom-header");
    $maggie_custom_header_details = array(
        'header-text'           => true,
        'default-text-color'    => 'white',
    );
    add_theme_support( 'html5', array( 'search-form', 'comment-list' ) );
    add_theme_support("custom-background");
    add_editor_style( "/assets/css/editor-style.css" );
    register_nav_menu( "mainmenu", __( "Main Menu", "maggie" ) );
    register_nav_menu( "secondary", __( "Secondary Menu", "maggie" ) );
    add_image_size( "maggie-blog", 385, 385, true );
    add_image_size( "maggie-blog-related", 110, 110, true );
}

add_action( "after_setup_theme", "maggie_theme_setup" );

// Assets Enqueue

function maggie_assets() {
    wp_enqueue_style( "magnific-all-css", get_theme_file_uri( "/assets/vendor/magnific-popup/css/magnific-popup.css" ), null, "5.9.0" );
    wp_enqueue_style( "slick-all-css", get_theme_file_uri( "/assets/vendor/slick/css/slick.css" ), null, "5.9.0" );
    wp_enqueue_style( "nanoscroller-all-css", get_theme_file_uri( "/assets/vendor/nanoscroller/css/nanoscroller.css" ), null, "5.9.0" );
    wp_enqueue_style( "brands-all-css", get_theme_file_uri( "/assets/vendor/fontawesome/css/brands.css" ), null, "5.9.0" );
    wp_enqueue_style( "style-all-css", get_theme_file_uri( "/assets/css/style.css" ), null, "5.9.0" );
    wp_enqueue_style( "custom-all-css", get_theme_file_uri( "/assets/css/custom.css" ), null, "5.9.0" );
    wp_enqueue_style( "maggie-css", get_stylesheet_uri(), null, "1.0.0" );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    
    wp_enqueue_script( "migrate-js", get_theme_file_uri( "/assets/vendor/jquery/jquery.min.js" ), null, "1.0.0" );
    wp_enqueue_script( "migrate-js", get_theme_file_uri( "/assets/vendor/jquery/jquery-migrate.min.js" ), array( "jquery" ), "1.0.0", true  );
    wp_enqueue_script( "bootstrap-js", get_theme_file_uri( "/assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ), array( "jquery" ), "4.3.1", true  );
    wp_enqueue_script( "core-js", get_theme_file_uri( "/assets/js/core.js" ), array( "jquery" ), "1.0.8", true  );
    wp_enqueue_script( "init-js", get_theme_file_uri( "/assets/js/init.js" ), array( "jquery" ), "1.0.0", true );
    wp_enqueue_script( "custom-js", get_theme_file_uri( "/assets/js/custom.js" ), array( "jquery" ), "1.0.0", true );
}

add_action( "wp_enqueue_scripts", "maggie_assets" );

/**
* Custom except length
*/
function deneb_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'deneb_custom_excerpt_length', 700 );

/**
* Except Filter
*/
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Get Popular Post

function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// Widget

function magala_widgets() {
    register_sidebar( array(
        'name'          => __( 'Sidebar Widget', 'magala' ),
        'id'            => 'sidebar',
        'description'   => __( 'Widgets in this area will be shown right sidebar.', 'magala' ),
        'before_widget' => '<div class="widget widget--sidebar ncr-widget-comments"><div class="widget-content">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}

add_action( "widgets_init", "magala_widgets" );

// Pagination

function maggie_pagination() {
    global $wp_query;
    $links = paginate_links( array(
        'current'  => max( 1, get_query_var( 'paged' ) ),
        'total'    => $wp_query->max_num_pages,
        'type'     => 'list',
        'mid_size' => apply_filters( "maggie_pagination_mid_size", 3 )
    ) );
    $links = str_replace( "page-link", "page-numbers", $links );
    $links = str_replace( "<span class='page-numbers'>", "</span>", $links );
    $links = str_replace( "next page-numbers", "page-numbers", $links );
    $links = str_replace( "prev page-numbers", "page-numbers", $links );
    echo wp_kses_post($links);
}



/**
 * Langona Theme Options
 *
 * @package Langona
 * 
 */

Kirki::add_config( 'langona_option', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

// Langona Panel
Kirki::add_panel( 'langona_theme_option', array(
    'priority' => 30,
    'title'    => esc_html__( 'Theme Option', 'langona' ),
    'icon'     => 'dashicons-admin-settings',
) );


// Header Section
Kirki::add_section( 'langona_header', array(
    'title'     => esc_html__( 'Header', 'langona' ),
    'panel'     => 'langona_theme_option',
    'priority'  => 30,
    'icon'      => 'dashicons-align-full-width',
) );

// Logo
Kirki::add_field( 'langona_option', [
	'type'      => 'image',
	'settings'  => 'langona_header_logo',
	'priority'  => 10,
	'label'     => esc_html__( 'Site Logo', 'langona' ),
	'section'   => 'langona_header',
	'default'	=> 'https://necromancers.dan-fisher.com/assets/img/logo.png',
	'choices'     => [
		'save_as' => 'url',
	],
] );

Kirki::add_section( 'langona_footer_setting', array(
    'title'     => esc_html__( 'Footer Setting', 'langona' ),
    'panel'     => 'langona_theme_option',
    'priority'  => 90,
    'icon'      => 'dashicons-laptop',
) );

// Copyright
Kirki::add_field( 'langona_option', [
	'type'     => 'text',
	'settings' => 'langona_copyright',
	'label'    => esc_html__( 'Copyright', 'langona' ),
	'section'  => 'langona_footer_setting',
	'default'  => esc_html__( 'Necromancers 2020 | All Rights Reserved', 'langona' ),
	'priority' => 70,
] );