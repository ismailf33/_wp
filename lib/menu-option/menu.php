<?php 

//Custom theme customize option
//Global Object ($wp_customize)


//add_section()========= Area provider(it is a parents)
//add_setting()========= It saves your value/Storage area of value where user enter value(It is a child of group)
//add_control()=========The tool visible to user ui(It is a child of group)
//Value showing =========== echo get_theme_mod('custom_theme_title_settings')


function custom_theme_panel_settings($wp_customize){

//We have to add our custom controls
$upload = 'variable';
    $wp_customize->add_section("custom_theme_section_area" , array(
        'title' => 'Custom theme settings'
    ));

//=========TitleArea========

    $wp_customize->add_setting("custom_theme_title_settings" , array(
        'default' => 'Enter your title'
    ));

    $wp_customize->add_control("custom_theme_title_control" , array(
        'label' => 'Enter your title',
        'section' => 'custom_theme_section_area',
        'settings' => 'custom_theme_title_settings'
    ));


//===========TextArea=======

    $wp_customize->add_setting("custom_theme_description_settings" , array(
        'default' => 'Description here...........'
    ));

    $wp_customize->add_control("custom_theme_description_control" , array(
        'label' => 'Description',
        'section' => 'custom_theme_section_area',
        'settings' => 'custom_theme_description_settings',
        'type' => 'textarea'
    ));




//===========Imagecontrol=======

    $wp_customize->add_setting("custom_theme_imageControl_settings" , array(
    //    'default' => '' //no necessary 
    ));
  
    $wp_customize->add_control(new WP_Customize_Image_Control( //WP_Customize_Cropped_Image_Control ====use to image croped
        $wp_customize,
        'custom_theme_imageControl_settings',        
        array(
            'label' => $upload ,
            'section' => 'custom_theme_section_area',
            'settings' => 'custom_theme_imageControl_settings',
    ) ));



//=========== Show pages control =======

$wp_customize->add_setting("custom_pagesSection_settings" , array(
    'default' => 'YES' 
    ));

    $wp_customize->add_control("custom_pagesSection_control" , array(
            'type' =>'dropdown-pages',
            'label' => 'Want to make it live ?',
            'section' => 'custom_theme_section_area',
            'settings' => 'custom_pagesSection_settings'
    ));
//it is provide an id use this method in this way
//<?php echo get_the_permalink(get_theme_mod('custom_pagesSection_settings'));


//=========== Radio button =======

    $wp_customize->add_setting("custom_theme_permission_settings" , array(
    'default' => 'YES' 
    ));

    $wp_customize->add_control("custom_theme_permission_control" , array(
            'type' =>'radio',
            'label' => 'Want to make it live ?',
            'section' => 'custom_theme_section_area',
            'settings' => 'custom_theme_permission_settings',
            'choices' => array(
                'true' =>'YES' ,
                'false' => 'NO',
                'none' =>'DEFAULT'
                )
    ));




//===========Colorcontrol=======

$wp_customize->add_setting("custom_theme_Colorcontrol_settings" , array(
    //    'default' => '' //no necessary 
    ));
  
    $wp_customize->add_control(new WP_Customize_Color_Control( 
        $wp_customize,
        'link_color',        
        array(
            'label' => 'Select Color' ,
            'section' => 'custom_theme_section_area',
            'settings' => 'custom_theme_Colorcontrol_settings',
    ) ));
 

}
add_action( 'customize_register' , 'custom_theme_panel_settings' );


