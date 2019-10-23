<?php
    function wp_enqueue_method() {
        //for css
        wp_enqueue_style('core', get_stylesheet_uri());
        wp_enqueue_style('file_name' , get_template_directory_uri().'/  ');
        //for googleFonts cdn
        wp_enqueue_style('file_name' , 'link');
        //for js
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-1.9.1.js');
        wp_enqueue_script('customs' , get_template_directory_uri().'/js/clean-blog.min.js' , array('jquery') , 1.0 , true);

            if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
            }
        }
        add_action( 'wp_enqueue_scripts', 'wp_enqueue_method' );
