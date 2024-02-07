<?php

function dc23_customize_register($wp_customize)
{
    $wp_customize->add_section('dc23_color', array(
        'title'          => 'Theme colors'
    ));

    //adding setting for copyright text
    $wp_customize->add_setting('dc23_primary_color', array(
        'primary'        => '#000000',
        
    ));
    $wp_customize->add_setting('dc23_secondary_color', array(
        'secondary'        => '#000000',
    ));

    // Add Controls
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dc23_primary_color', array(
        'label' => 'Primary Color',
        'section' => 'dc23_color',
        'settings' => 'dc23_primary_color'
    )));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'dc23_secondary_color', array(
        'label' => 'Secondary color',
        'section' => 'dc23_color',
        'settings' => 'dc23_secondary_color'
    )));
}
add_action('customize_register', 'dc23_customize_register');
