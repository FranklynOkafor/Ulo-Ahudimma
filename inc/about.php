<?php
/**
 * About Page Functions
 * Add these to your functions.php
 * 
 * @package Ahudimma
 */

// ========================================
// 1. ENQUEUE ABOUT PAGE ASSETS
// ========================================

function ahudimma_enqueue_about_assets() {
    // Only load on about page
    if (is_page('about') || is_page_template('page-about.php')) {
        
        // Enqueue CSS
        wp_enqueue_style(
            'about-page',
            get_template_directory_uri() . '/assets/css/about-page-styles.css',
            array(),
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'ahudimma_enqueue_about_assets');

// ========================================
// 2. ADD ABOUT PAGE CUSTOMIZER SETTINGS
// ========================================

function ahudimma_about_customizer_settings($wp_customize) {
    
    // Add panel for About Page
    $wp_customize->add_panel('ahudimma_about_panel', array(
        'title'    => __('About Page Settings', 'ulo-ahudimma'),
        'priority' => 131,
    ));
    
    // ==========================================
    // SECTION 1: OUR STORY
    // ==========================================
    
    $wp_customize->add_section('ahudimma_about_story', array(
        'title' => __('Our Story Section', 'ulo-ahudimma'),
        'panel' => 'ahudimma_about_panel',
    ));
    
    // Story Content
    $wp_customize->add_setting('about_story', array(
        'default'           => '<p>At Ụlọ Ahụ̣dịmma, we are dedicated to providing the highest quality healthcare services to our community.</p>',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('about_story', array(
        'label'   => __('Story Content', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_story',
        'type'    => 'textarea',
    ));
    
    // Story Image
    $wp_customize->add_setting('about_story_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_story_image', array(
        'label'   => __('Story Image', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_story',
    )));
    
    // ==========================================
    // SECTION 2: MISSION, VISION, VALUES
    // ==========================================
    
    $wp_customize->add_section('ahudimma_about_mvv', array(
        'title' => __('Mission, Vision & Values', 'ulo-ahudimma'),
        'panel' => 'ahudimma_about_panel',
    ));
    
    // Mission
    $wp_customize->add_setting('about_mission', array(
        'default'           => 'To improve the health and well-being of our patients through compassionate care, cutting-edge technology, and a commitment to excellence.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_mission', array(
        'label'   => __('Our Mission', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_mvv',
        'type'    => 'textarea',
    ));
    
    // Vision
    $wp_customize->add_setting('about_vision', array(
        'default'           => 'To be a trusted healthcare institution recognized for excellence, innovation, and patient-centered care.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_vision', array(
        'label'   => __('Our Vision', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_mvv',
        'type'    => 'textarea',
    ));
    
    // Values
    $wp_customize->add_setting('about_values', array(
        'default'           => 'Compassion, Excellence, Integrity, Innovation, and Patient-Centered Care guide everything we do.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_values', array(
        'label'   => __('Our Values', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_mvv',
        'type'    => 'textarea',
    ));
    
    // ==========================================
    // SECTION 3: STATISTICS
    // ==========================================
    
    $wp_customize->add_section('ahudimma_about_stats', array(
        'title' => __('Statistics', 'ulo-ahudimma'),
        'panel' => 'ahudimma_about_panel',
    ));
    
    // Patients
    $wp_customize->add_setting('stat_patients', array(
        'default'           => '20,000+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat_patients', array(
        'label'   => __('Happy Patients', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_stats',
        'type'    => 'text',
    ));
    
    // Doctors
    $wp_customize->add_setting('stat_doctors', array(
        'default'           => '200+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat_doctors', array(
        'label'   => __('Medical Doctors', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_stats',
        'type'    => 'text',
    ));
    
    // Awards
    $wp_customize->add_setting('stat_awards', array(
        'default'           => '100+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat_awards', array(
        'label'   => __('Awards Won', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_stats',
        'type'    => 'text',
    ));
    
    // Staff
    $wp_customize->add_setting('stat_staff', array(
        'default'           => '500+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('stat_staff', array(
        'label'   => __('Staff Members', 'ulo-ahudimma'),
        'section' => 'ahudimma_about_stats',
        'type'    => 'text',
    ));
}
add_action('customize_register', 'ahudimma_about_customizer_settings');

// ========================================
// 3. ADD ACF FIELD FOR LEADERSHIP (Optional)
// ========================================

/**
 * Add ACF field to mark doctors as leadership
 * Uncomment if you want to use the leadership feature
 */
/*
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
        'key' => 'group_leadership',
        'title' => 'Leadership Settings',
        'fields' => array(
            array(
                'key' => 'field_is_leadership',
                'label' => 'Display in Leadership Team',
                'name' => 'is_leadership',
                'type' => 'true_false',
                'ui' => 1,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'doctor',
                ),
            ),
        ),
    ));
}
*/

// ========================================
// 4. CUSTOMIZE EXCERPT LENGTH FOR TEAM
// ========================================

function ahudimma_team_excerpt_length($length) {
    if (is_page_template('page-about.php')) {
        return 15;
    }
    return $length;
}
add_filter('excerpt_length', 'ahudimma_team_excerpt_length');