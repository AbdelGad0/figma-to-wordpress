<?php
/**
 * Customizer settings for Positively theme
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer settings
 */
function positively_customize_register($wp_customize) {
    
    // Section: Theme Colors
    $wp_customize->add_section('positively_colors', array(
        'title' => __('Theme Colors', 'positively'),
        'priority' => 30,
    ));
    
    // Primary Color
    $wp_customize->add_setting('positively_primary_color', array(
        'default' => '#3b82f6',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'positively_primary_color', array(
        'label' => __('Primary Color', 'positively'),
        'section' => 'positively_colors',
    )));
    
    // Section: Social Media Links
    $wp_customize->add_section('positively_social', array(
        'title' => __('Social Media', 'positively'),
        'priority' => 40,
    ));
    
    // Social Links (using repeater pattern in customizer)
    $wp_customize->add_setting('positively_facebook', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('positively_facebook', array(
        'label' => __('Facebook URL', 'positively'),
        'section' => 'positively_social',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('positively_twitter', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('positively_twitter', array(
        'label' => __('Twitter URL', 'positively'),
        'section' => 'positively_social',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('positively_linkedin', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('positively_linkedin', array(
        'label' => __('LinkedIn URL', 'positively'),
        'section' => 'positively_social',
        'type' => 'text',
    ));
    
    // Section: Footer Settings
    $wp_customize->add_section('positively_footer', array(
        'title' => __('Footer Settings', 'positively'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('positively_footer_text', array(
        'default' => __('Copyright © 2024 Positively. All rights reserved.', 'positively'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('positively_footer_text', array(
        'label' => __('Footer Text', 'positively'),
        'section' => 'positively_footer',
        'type' => 'text',
    ));
}