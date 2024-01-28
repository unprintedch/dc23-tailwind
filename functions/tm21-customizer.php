<?php

function tm21_customize_register($wp_customize)
{
    $wp_customize->add_section('tm21_color', array(
        'title'          => 'Theme colors'
    ));

    //adding setting for copyright text
    $wp_customize->add_setting('tm21_primary_color', array(
        'primary'        => '#000000',
        
    ));
    $wp_customize->add_setting('tm21_secondary_color', array(
        'secondary'        => '#000000',
    ));

    // Add Controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tm21_primary_color', array(
        'label' => 'Primary Color',
        'section' => 'tm21_color',
        'settings' => 'tm21_primary_color'
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'tm21_secondary_color', array(
        'label' => 'Secondary color',
        'section' => 'tm21_color',
        'settings' => 'tm21_secondary_color'
    )));
}
add_action('customize_register', 'tm21_customize_register');
