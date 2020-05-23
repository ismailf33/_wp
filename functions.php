<?php

if ( ! function_exists( 'wp_car_setup' ) ) :

  function wp_car_setup() {
    load_theme_textdomain( 'wp_car', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support('post-formats',array('video','audio','aside','gallery'));
    add_theme_support('post-thumbnails' , array('post' , 'page' /*custom_post types name(id)*/));
    set_post_thumbnail_size( 200, 200, true ); //for all post thumbnails 
    add_image_size( 'myThumb', 400, 400 ); //create new thumbnail size (thumbnail id,size(2))

    register_nav_menus( array(
        'header-menu' => esc_html__( 'Header', 'text-domian' ),
        'footer-menu' => esc_html__( 'Footer', 'text-domian' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );

    add_theme_support( 'custom-background', apply_filters( 'wp_car_custom_background_args', array(
         'default-color' => 'ffffff',
         'default-image' => '',
    ) ) );

    add_theme_support( 'customize-selective-refresh-widgets' );

    add_theme_support( 'custom-logo', array(
          'height'      => 250,
          'width'       => 250,
          'flex-width'  => true,
          'flex-height' => true,
    ) );
  }
endif;
add_action( 'after_setup_theme', 'wp_car_setup' );


function wp_enqueue_method() {
  //for css
  wp_enqueue_style('core' , get_stylesheet_uri() , array() , wp_get_theme()->get( 'Version' ) );
  wp_enqueue_style('file_name' , get_template_directory_uri().'/  ') , array() , wp_get_theme()->get( 'Version' ) ;
  //for googleFonts cdn
  wp_enqueue_style('file_name' , 'link');
  //for js
  wp_register_script( 'jquery'); //default wordpress jquery
  wp_enqueue_script('customs' , get_template_directory_uri().'/js/clean-blog.min.js' , array('jquery') , 1.0 , true);

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
   }
}
add_action( 'wp_enqueue_scripts', 'wp_enqueue_method' );





















require_once(get_template_directory().'/inc/enqueue.php');
require_once(get_template_directory().'/inc/theme_support.php');
require_once(get_template_directory().'/lib/theme-option/theme-option.php');
