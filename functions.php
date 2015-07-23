<?php

function ankara_scripts()
{
//    Loading local jquery to avoid no-conflict $ issue when working with Materialize css
    wp_enqueue_script('jquery-custom', get_stylesheet_directory_uri(). '/js/jquery.min.js', [], false, true);
    wp_enqueue_script('jquery-smooth-scroll', get_stylesheet_directory_uri() . '/js/jquery.smooth-scroll.js', array(), false, true);
    wp_enqueue_script('materialize', get_template_directory_uri() . '/js/materialize.min.js', array(), false, true);
    wp_enqueue_script('masonry', get_template_directory_uri() . '/js/masonry.min.js', array(), false, true);
    wp_enqueue_script('ankara', get_template_directory_uri() . '/js/ankara.js', array(), false, true);
    wp_enqueue_script('nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.min.js', array(), false, true);
}

add_action( 'wp_enqueue_scripts', 'ankara_scripts' );

function ankara_theme_customizer( $wp_customize ) {
    //Logo
    $wp_customize->add_section( 'ankara_logo_section' , array(
        'title'       => __( 'Logo', 'ankara' ),
        'priority'    => 30,
        'description' => 'Upload a logo to replace the default site name in navigation bar',
    ) );
    $wp_customize->add_setting( 'ankara_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ankara_logo', array(
        'label'    => __( 'Logo', 'ankara' ),
        'section'  => 'ankara_logo_section',
        'settings' => 'ankara_logo',
    ) ) );

    // End logo
}
add_action( 'customize_register', 'ankara_theme_customizer' );