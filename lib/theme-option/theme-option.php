<?php

/**
 * Create custom theme option page
 */


add_action('admin_menu', 'theme_options');

function theme_options(){
    add_menu_page(' Theme Options' , 'Options' , 'manage_options' , 'theme-options' , 'mycustomoptions' , 'dashicons-admin-appearance'  ,6);

}

function mycustomoptions(){
?>
    <div>
        <h1>Custom settings</h1>
        <span><?php settings_errors();?></span>
        <form action="options.php" method="post">
            <?php 
                settings_fields('section');
                do_settings_sections('theme-options');
                submit_button();
            ?>
        </form>
    </div>
<?php
}

function custom_theme_options(){
    //Step#1:this code basically provides an area where you can register your fields
    add_settings_section( 
        'section', //this id of section
    __( 'All pages', 'smellrose' ),
         null,
        'theme-options' 
    ); //area provider to store settings field 

    //Step#2:this code basically provides an area where you can register your fields
    add_settings_field( 
        'channel_name',
    __( 'Channel Name', 'smellrose' ),
        'display_channel_name',
        'theme-options',
        'section' 
    );

    add_settings_field( 
        'youtube_url',
    __( 'Youtube', 'smellrose' ),
        'display_youtube_link',
        'theme-options',
        'section' 
    );
    add_settings_field( 
        'facebook_url',
    __( 'Facebook', 'smellrose' ),
        'display_facebook_link',
        'theme-options',
        'section' 
    );

    add_settings_field( 
        'gender_select',
    __( 'Gender', 'smellrose' ),
        'display_gender_type',
        'theme-options',
        'section' 
    );

    //Step#3:We need to add this(channel_name) settings to area
    register_setting('section','chennel_name');
    register_setting('section','youtube_url');
    register_setting('section','facebook_url');
    register_setting('section','gender_select');
}

add_action('admin_init', 'custom_theme_options');

function display_channel_name(){
?>
    
    
<input type="text" name="chennel_name" id="chennel_name" class="" value="<?php echo get_option( 'chennel_name')?>">


<?php
}

function display_youtube_link(){
$youtube = get_option( 'youtube_url');

?>    


    <select name="youtube_url" id="youtube_url">
        <option value="full" <?php echo $youtube=='full' ? 'selected = "selected"' : ''; ?>>Full</option>
        <option value="half" <?php echo $youtube=='half' ? 'selected = "selected"' : ''; ?>>Half</option>
        <option value="semihalf" <?php echo $youtube=='semihalf' ? 'selected = "selected"' : ''; ?>>Semihalf</option>
        
    </select>   
<?php
}

function display_facebook_link(){
?>    
    <input type="radio" name="gender"  value="male"> Male<br>
    <input type="radio" name="gender" checked="checked" value="female"> Female<br>
    <input type="radio" name="gender" value="other"> Other
<?php
}


function display_gender_type(){
?>    
    <input type="radio" name="gende" checked="checked"  value="male"> Male<br>
    <input type="radio" name="gende" value="female"> Female<br>
    <input type="radio" name="gende" value="other"> Other
<?php
}

// add_settings_field($id, $title, $callback, $page, $section, $args) //settings provider to store values of use



// add_settings_section( $id:string, $title:string, $callback:callable, $page:string ) //area provider to store settings field 
// add_settings_field($id, $title, $callback, $page, $section, $args) //settings provider to store values of user 
// register_setting( $option_group:string, $option_name:string, $args:array )







// add_menu_page(
//     __( 'My Page', 'textdomain' ),
//     __( 'My Title', 'textdomain' ),
//     'manage_options',
//     'my-page',
//     'my_admin_page_function',
//     'dashicons-admin-media'
// );

