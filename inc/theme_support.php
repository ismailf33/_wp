<?php

if ( ! function_exists( 'wp_car_setup' ) ) :

    function wp_car_setup() {

        load_theme_textdomain( 'wp_car', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support('post-formats',array('video','audio','aside','gallery'));

        add_theme_support('post-thumbnails' , array('post' , 'page'));

        set_post_thumbnail_size( 200, 200, true );
        add_image_size( 'myThumb', 400, 400 );

        register_nav_menus( array(
        'menu-1' => esc_html__( 'Primary', 'wp_car' ),
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
