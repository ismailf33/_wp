<?php 



//========custom function for custom_meta_boxes

function d_post_type()
    {
        $labels = array(
            'name'                  => 'slide',
            'singular_name'         => 'B',
            'menu_name'             => 'functions',
            'name_admin_bar'        => 'D',
            'add_new'               => 'E',
            'add_new_item'          => 'F',
            'new_item'              => 'G',
            'edit_item'             => 'H',
            'view_item'             => 'I',
            'all_items'             => 'J',
            'search items'          => 'K',
            'parent_item_colon'     => 'L',
            'not_found'             => 'M',
            'not_found_in_trash'    => 'N',
            );

        $args = array(
            'labels'                => $labels,
            'public'                => true,
            'publicaly_queryable'   => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'rewrite'               => array( 'slug' => 'Slider' ),
            'capability_type'       => 'post',
            'has_archive'           => true,
            'Hierarchical'          => false,
            'menu_position'         => null,
            'menu_icon'             => 'dashicons-format-image',
            'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','hierarchical','trackbacks','custom-fields','revisions','page-attributes'),
            'taxonomies'            =>array('category'),
            );

        register_post_type('Slider',$args);
        register_taxonomy('Slider_category','Slider',array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array('slug' => 'slider-category')));
    }
    add_action('init','d_post_type');





//==========add meta boxes in post and page

// function wpdocs_register_meta_boxes() {
//     add_meta_box( 'meta-next-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'post','normal','high' );
//     add_meta_box( 'meta-ext-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_display_callback', 'page','side','default' );
// }
// add_action( 'add_meta_boxes', 'wpdocs_register_meta_boxes' );


//==========add meta boxes in custom post type

// function wpdocs_register_meta_bookes() {
//   add_meta_box( 'meta-et-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_dis_callback', 'Slider','normal','default' );
// }
// add_action( 'add_meta_boxes_Slider', 'wpdocs_register_meta_bookes' );



//==========add meta boxes in dashboard

// function wpdocs_register_meta_bookes() {
//     add_meta_box( 'meta-et-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_dis_callback', 'dashboard','side','high' );
//   }
//   add_action( 'wp_dashboard_setup', 'wpdocs_register_meta_bookes' );   //wp_dashboard setup is a hook for dashboard


//========remove dashboards meta-box
// function dash_meta_remove(){
//     remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
// }
// add_action('wp_dashboard_setup','dash_meta_remove');






//==========Now we will discuss callback function of custom meta box

function wpdocs_register_meta_bookes() {
  add_meta_box( 'meta-et-id', __( 'My Meta Box', 'textdomain' ), 'wpdocs_my_dis_callback', 'Slider','normal','default' );
}
add_action( 'add_meta_boxes', 'wpdocs_register_meta_bookes' );


function wpdocs_my_dis_callback(){
//for name hiding of input type
wp_nonce_field( basename(__FILE__),'wp_nonce_it' )
     ?>
<p>hellow world</p>
color <input type="text" placeholder="yellow" value="ddfgfhgjhuy">
<?php } 



