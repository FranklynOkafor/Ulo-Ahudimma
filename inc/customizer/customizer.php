<?php

/**
 * WordPress Customizer Settings for Ahudimma Healthcare Theme
 * Add this code to your functions.php file
 */

// ========================================
// 1. REGISTER CUSTOMIZER SETTINGS
// ========================================

function ahudimma_customize_register($wp_customize)
{

  // ========== PANEL: THEME SETTINGS ==========
  $wp_customize->add_panel('ahudimma_theme_settings', array(
    'title' => __('Ahudimma Theme Settings', 'ulo-ahudimma'),
    'description' => __('Customize your healthcare website colors, typography, and layout', 'ulo-ahudimma'),
    'priority' => 30,
  ));

  // ==========================================
  // SECTION 1: COLOR SETTINGS
  // ==========================================

  $wp_customize->add_section('ahudimma_colors', array(
    'title' => __('Color Settings', 'ulo-ahudimma'),
    'panel' => 'ahudimma_theme_settings',
    'priority' => 10,
  ));

  // Primary Blue
  $wp_customize->add_setting('primary_blue_color', array(
    'default' => '#2196F3',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_blue_color', array(
    'label' => __('Primary Blue', 'ulo-ahudimma'),
    'description' => __('Main brand color used for buttons, links, and accents', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'primary_blue_color',
  )));

  // Primary Blue Dark (Hover state)
  $wp_customize->add_setting('primary_blue_dark_color', array(
    'default' => '#1976D2',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_blue_dark_color', array(
    'label' => __('Primary Blue Dark (Hover)', 'ulo-ahudimma'),
    'description' => __('Darker shade for hover effects', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'primary_blue_dark_color',
  )));

  // Navy Dark
  $wp_customize->add_setting('navy_dark_color', array(
    'default' => '#0A1F3D',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'navy_dark_color', array(
    'label' => __('Navy Dark', 'ulo-ahudimma'),
    'description' => __('Used for headers, footer, and dark sections', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'navy_dark_color',
  )));

  // Text Dark
  $wp_customize->add_setting('text_dark_color', array(
    'default' => '#2c3e50',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_dark_color', array(
    'label' => __('Text Dark', 'ulo-ahudimma'),
    'description' => __('Primary text color', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'text_dark_color',
  )));

  // Text Light
  $wp_customize->add_setting('text_light_color', array(
    'default' => '#64748b',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_light_color', array(
    'label' => __('Text Light', 'ulo-ahudimma'),
    'description' => __('Secondary text color', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'text_light_color',
  )));

  // Background Light
  $wp_customize->add_setting('bg_light_color', array(
    'default' => '#F5F9FC',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_light_color', array(
    'label' => __('Background Light', 'ulo-ahudimma'),
    'description' => __('Light background for sections', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'bg_light_color',
  )));

  // Accent Red
  $wp_customize->add_setting('accent_red_color', array(
    'default' => '#EF4444',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_red_color', array(
    'label' => __('Accent Red', 'ulo-ahudimma'),
    'description' => __('Used for alerts and urgent information', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'accent_red_color',
  )));

  // Accent Green
  $wp_customize->add_setting('accent_green_color', array(
    'default' => '#4CAF50',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_green_color', array(
    'label' => __('Accent Green', 'ulo-ahudimma'),
    'description' => __('Used for success messages and positive information', 'ulo-ahudimma'),
    'section' => 'ahudimma_colors',
    'settings' => 'accent_green_color',
  )));

  // ==========================================
  // SECTION 2: TYPOGRAPHY SETTINGS
  // ==========================================

  $wp_customize->add_section('ahudimma_typography', array(
    'title' => __('Typography Settings', 'ulo-ahudimma'),
    'panel' => 'ahudimma_theme_settings',
    'priority' => 20,
  ));

  // Primary Font Family
  $wp_customize->add_setting('primary_font_family', array(
    'default' => 'system',
    'sanitize_callback' => 'ahudimma_sanitize_font_family',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('primary_font_family', array(
    'label' => __('Primary Font Family', 'ulo-ahudimma'),
    'description' => __('Main font used throughout the site', 'ulo-ahudimma'),
    'section' => 'ahudimma_typography',
    'type' => 'select',
    'choices' => array(
      'system' => 'System Default',
      'inter' => 'Inter (Google Font)',
      'roboto' => 'Roboto (Google Font)',
      'open-sans' => 'Open Sans (Google Font)',
      'lato' => 'Lato (Google Font)',
      'poppins' => 'Poppins (Google Font)',
      'montserrat' => 'Montserrat (Google Font)',
      'nunito' => 'Nunito (Google Font)',
      'raleway' => 'Raleway (Google Font)',
    ),
  ));

  // Base Font Size
  $wp_customize->add_setting('base_font_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('base_font_size', array(
    'label' => __('Base Font Size (px)', 'ulo-ahudimma'),
    'description' => __('Default: 16px', 'ulo-ahudimma'),
    'section' => 'ahudimma_typography',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 12,
      'max' => 24,
      'step' => 1,
    ),
  ));

  // Heading Font Weight
  $wp_customize->add_setting('heading_font_weight', array(
    'default' => '700',
    'sanitize_callback' => 'ahudimma_sanitize_font_weight',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('heading_font_weight', array(
    'label' => __('Heading Font Weight', 'ulo-ahudimma'),
    'section' => 'ahudimma_typography',
    'type' => 'select',
    'choices' => array(
      '300' => 'Light (300)',
      '400' => 'Normal (400)',
      '500' => 'Medium (500)',
      '600' => 'Semi Bold (600)',
      '700' => 'Bold (700)',
      '800' => 'Extra Bold (800)',
    ),
  ));

  // Body Font Weight
  $wp_customize->add_setting('body_font_weight', array(
    'default' => '400',
    'sanitize_callback' => 'ahudimma_sanitize_font_weight',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('body_font_weight', array(
    'label' => __('Body Font Weight', 'ulo-ahudimma'),
    'section' => 'ahudimma_typography',
    'type' => 'select',
    'choices' => array(
      '300' => 'Light (300)',
      '400' => 'Normal (400)',
      '500' => 'Medium (500)',
      '600' => 'Semi Bold (600)',
    ),
  ));

  // Line Height
  $wp_customize->add_setting('body_line_height', array(
    'default' => '1.6',
    'sanitize_callback' => 'ahudimma_sanitize_float',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('body_line_height', array(
    'label' => __('Line Height', 'ulo-ahudimma'),
    'description' => __('Default: 1.6', 'ulo-ahudimma'),
    'section' => 'ahudimma_typography',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 1,
      'max' => 3,
      'step' => 0.1,
    ),
  ));

  // ==========================================
  // SECTION 3: HEADER SETTINGS
  // ==========================================

  $wp_customize->add_section('ahudimma_header', array(
    'title' => __('Header Settings', 'ulo-ahudimma'),
    'panel' => 'ahudimma_theme_settings',
    'priority' => 30,
  ));

  // Header Background Color
  $wp_customize->add_setting('header_bg_color', array(
    'default' => '#FFFFFF',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
    'label' => __('Header Background Color', 'ulo-ahudimma'),
    'section' => 'ahudimma_header',
    'settings' => 'header_bg_color',
  )));

  // Sticky Header
  $wp_customize->add_setting('enable_sticky_header', array(
    'default' => true,
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('enable_sticky_header', array(
    'label' => __('Enable Sticky Header', 'ulo-ahudimma'),
    'description' => __('Header stays visible when scrolling', 'ulo-ahudimma'),
    'section' => 'ahudimma_header',
    'type' => 'checkbox',
  ));

  // Header Padding
  $wp_customize->add_setting('header_padding', array(
    'default' => '20',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('header_padding', array(
    'label' => __('Header Padding (px)', 'ulo-ahudimma'),
    'description' => __('Top and bottom padding. Default: 20px', 'ulo-ahudimma'),
    'section' => 'ahudimma_header',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 10,
      'max' => 50,
      'step' => 5,
    ),
  ));

  // Logo Height
  $wp_customize->add_setting('logo_height', array(
    'default' => '40',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('logo_height', array(
    'label' => __('Logo Height (px)', 'ulo-ahudimma'),
    'description' => __('Default: 40px', 'ulo-ahudimma'),
    'section' => 'ahudimma_header',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 24,
      'max' => 80,
      'step' => 4,
    ),
  ));

  // Navigation Menu Gap
  $wp_customize->add_setting('nav_menu_gap', array(
    'default' => '40',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('nav_menu_gap', array(
    'label' => __('Navigation Menu Gap (px)', 'ulo-ahudimma'),
    'description' => __('Space between menu items. Default: 40px', 'ulo-ahudimma'),
    'section' => 'ahudimma_header',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 20,
      'max' => 80,
      'step' => 5,
    ),
  ));

  // ==========================================
  // SECTION 4: LAYOUT SETTINGS
  // ==========================================

  $wp_customize->add_section('ahudimma_layout', array(
    'title' => __('Layout Settings', 'ulo-ahudimma'),
    'panel' => 'ahudimma_theme_settings',
    'priority' => 40,
  ));

  // Container Max Width
  $wp_customize->add_setting('container_max_width', array(
    'default' => '1200',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('container_max_width', array(
    'label' => __('Container Max Width (px)', 'ulo-ahudimma'),
    'description' => __('Maximum width for content container. Default: 1200px', 'ulo-ahudimma'),
    'section' => 'ahudimma_layout',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 960,
      'max' => 1600,
      'step' => 20,
    ),
  ));

  // Section Spacing
  $wp_customize->add_setting('section_spacing', array(
    'default' => '80',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('section_spacing', array(
    'label' => __('Section Spacing (px)', 'ulo-ahudimma'),
    'description' => __('Vertical spacing between sections. Default: 80px', 'ulo-ahudimma'),
    'section' => 'ahudimma_layout',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 40,
      'max' => 160,
      'step' => 10,
    ),
  ));

  // Border Radius
  $wp_customize->add_setting('border_radius', array(
    'default' => '8',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('border_radius', array(
    'label' => __('Border Radius (px)', 'ulo-ahudimma'),
    'description' => __('Roundness of cards, buttons, etc. Default: 8px', 'ulo-ahudimma'),
    'section' => 'ahudimma_layout',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0,
      'max' => 20,
      'step' => 2,
    ),
  ));

  // ==========================================
  // SECTION 5: BUTTON SETTINGS
  // ==========================================

  $wp_customize->add_section('ahudimma_buttons', array(
    'title' => __('Button Settings', 'ulo-ahudimma'),
    'panel' => 'ahudimma_theme_settings',
    'priority' => 50,
  ));

  // Button Padding Vertical
  $wp_customize->add_setting('button_padding_vertical', array(
    'default' => '12',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('button_padding_vertical', array(
    'label' => __('Button Padding Vertical (px)', 'ulo-ahudimma'),
    'description' => __('Top and bottom padding. Default: 12px', 'ulo-ahudimma'),
    'section' => 'ahudimma_buttons',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 8,
      'max' => 24,
      'step' => 2,
    ),
  ));

  // Button Padding Horizontal
  $wp_customize->add_setting('button_padding_horizontal', array(
    'default' => '28',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('button_padding_horizontal', array(
    'label' => __('Button Padding Horizontal (px)', 'ulo-ahudimma'),
    'description' => __('Left and right padding. Default: 28px', 'ulo-ahudimma'),
    'section' => 'ahudimma_buttons',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 16,
      'max' => 48,
      'step' => 4,
    ),
  ));

  // Button Font Size
  $wp_customize->add_setting('button_font_size', array(
    'default' => '16',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('button_font_size', array(
    'label' => __('Button Font Size (px)', 'ulo-ahudimma'),
    'description' => __('Default: 16px', 'ulo-ahudimma'),
    'section' => 'ahudimma_buttons',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 12,
      'max' => 20,
      'step' => 1,
    ),
  ));

  // Button Border Radius
  $wp_customize->add_setting('button_border_radius', array(
    'default' => '6',
    'sanitize_callback' => 'absint',
    'transport' => 'refresh',
  ));
  $wp_customize->add_control('button_border_radius', array(
    'label' => __('Button Border Radius (px)', 'ulo-ahudimma'),
    'description' => __('Default: 6px', 'ulo-ahudimma'),
    'section' => 'ahudimma_buttons',
    'type' => 'number',
    'input_attrs' => array(
      'min' => 0,
      'max' => 50,
      'step' => 2,
    ),
  ));
}
add_action('customize_register', 'ahudimma_customize_register');

// ========================================
// 2. SANITIZATION CALLBACKS
// ========================================

function ahudimma_sanitize_font_family($input)
{
  $valid = array('system', 'inter', 'roboto', 'open-sans', 'lato', 'poppins', 'montserrat', 'nunito', 'raleway');
  return (in_array($input, $valid)) ? $input : 'system';
}

function ahudimma_sanitize_font_weight($input)
{
  $valid = array('300', '400', '500', '600', '700', '800');
  return (in_array($input, $valid)) ? $input : '400';
}

function ahudimma_sanitize_float($input)
{
  return floatval($input);
}

// ========================================
// 3. ENQUEUE GOOGLE FONTS
// ========================================

function ahudimma_enqueue_google_fonts()
{
  $font_family = get_theme_mod('primary_font_family', 'system');

  if ($font_family !== 'system') {
    $font_urls = array(
      'inter' => 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
      'roboto' => 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap',
      'open-sans' => 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap',
      'lato' => 'https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap',
      'poppins' => 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap',
      'montserrat' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap',
      'nunito' => 'https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap',
      'raleway' => 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700&display=swap',
    );

    if (isset($font_urls[$font_family])) {
      wp_enqueue_style('ahudimma-google-font', $font_urls[$font_family], array(), null);
    }
  }
}
add_action('wp_enqueue_scripts', 'ahudimma_enqueue_google_fonts');

// ========================================
// 4. GENERATE DYNAMIC CSS
// ========================================

function ahudimma_customizer_css()
{
  // Get all customizer values with fallbacks
  $primary_blue = get_theme_mod('primary_blue_color', '#2196F3');
  $primary_blue_dark = get_theme_mod('primary_blue_dark_color', '#1976D2');
  $navy_dark = get_theme_mod('navy_dark_color', '#0A1F3D');
  $text_dark = get_theme_mod('text_dark_color', '#2c3e50');
  $text_light = get_theme_mod('text_light_color', '#64748b');
  $bg_light = get_theme_mod('bg_light_color', '#F5F9FC');
  $accent_red = get_theme_mod('accent_red_color', '#EF4444');
  $accent_green = get_theme_mod('accent_green_color', '#4CAF50');

  $font_family = get_theme_mod('primary_font_family', 'system');
  $base_font_size = get_theme_mod('base_font_size', 16);
  $heading_font_weight = get_theme_mod('heading_font_weight', '700');
  $body_font_weight = get_theme_mod('body_font_weight', '400');
  $body_line_height = get_theme_mod('body_line_height', '1.6');

  $header_bg = get_theme_mod('header_bg_color', '#FFFFFF');
  $sticky_header = get_theme_mod('enable_sticky_header', true);
  $header_padding = get_theme_mod('header_padding', 20);
  $logo_height = get_theme_mod('logo_height', 40);
  $nav_gap = get_theme_mod('nav_menu_gap', 40);

  $container_width = get_theme_mod('container_max_width', 1200);
  $section_spacing = get_theme_mod('section_spacing', 80);
  $border_radius = get_theme_mod('border_radius', 8);

  $btn_padding_v = get_theme_mod('button_padding_vertical', 12);
  $btn_padding_h = get_theme_mod('button_padding_horizontal', 28);
  $btn_font_size = get_theme_mod('button_font_size', 16);
  $btn_border_radius = get_theme_mod('button_border_radius', 6);

  // Font family mapping
  $font_stacks = array(
    'system' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif',
    'inter' => '"Inter", sans-serif',
    'roboto' => '"Roboto", sans-serif',
    'open-sans' => '"Open Sans", sans-serif',
    'lato' => '"Lato", sans-serif',
    'poppins' => '"Poppins", sans-serif',
    'montserrat' => '"Montserrat", sans-serif',
    'nunito' => '"Nunito", sans-serif',
    'raleway' => '"Raleway", sans-serif',
  );

  $selected_font = isset($font_stacks[$font_family]) ? $font_stacks[$font_family] : $font_stacks['system'];

?>
  <style type="text/css">
    /* Dynamic CSS from WordPress Customizer */
    :root {
      /* Colors */
      --primary-blue: <?php echo esc_attr($primary_blue); ?>;
      --primary-blue-dark: <?php echo esc_attr($primary_blue_dark); ?>;
      --navy-dark: <?php echo esc_attr($navy_dark); ?>;
      --text-dark: <?php echo esc_attr($text_dark); ?>;
      --text-light: <?php echo esc_attr($text_light); ?>;
      --bg-light: <?php echo esc_attr($bg_light); ?>;
      --accent-red: <?php echo esc_attr($accent_red); ?>;
      --accent-green: <?php echo esc_attr($accent_green); ?>;

      /* Typography */
      --font-primary: <?php echo $selected_font; ?>;
      --base-font-size: <?php echo esc_attr($base_font_size); ?>px;
      --heading-font-weight: <?php echo esc_attr($heading_font_weight); ?>;
      --body-font-weight: <?php echo esc_attr($body_font_weight); ?>;
      --body-line-height: <?php echo esc_attr($body_line_height); ?>;

      /* Layout */
      --container-max-width: <?php echo esc_attr($container_width); ?>px;
      --section-spacing: <?php echo esc_attr($section_spacing); ?>px;
      --border-radius: <?php echo esc_attr($border_radius); ?>px;

      /* Header */
      --header-bg-color: <?php echo esc_attr($header_bg); ?>;
      --header-padding: <?php echo esc_attr($header_padding); ?>px 0;
      --logo-height: <?php echo esc_attr($logo_height); ?>px;
      --nav-gap: <?php echo esc_attr($nav_gap); ?>px;

      /* Buttons */
      --btn-padding: <?php echo esc_attr($btn_padding_v); ?>px <?php echo esc_attr($btn_padding_h); ?>px;
      --btn-font-size: <?php echo esc_attr($btn_font_size); ?>px;
      --btn-border-radius: <?php echo esc_attr($btn_border_radius); ?>px;
    }

    body {
      font-size: var(--base-font-size);
      font-weight: var(--body-font-weight);
      line-height: var(--body-line-height);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: var(--heading-font-weight);
    }

    .site-header {
      background-color: var(--header-bg-color);
      padding: var(--header-padding);
      /* <?php if ($sticky_header): ?>
      position: sticky; 
      top: 0;
      z-index: 1000;
      <?php endif; ?> */
    }

    .site-branding .custom-logo {
      height: var(--logo-height);
    }

    .pimary-menu {
      gap: var(--nav-gap);
    }

    .container {
      max-width: var(--container-max-width);
    }

    .btn {
      padding: var(--btn-padding);
      font-size: var(--btn-font-size);
      border-radius: var(--btn-border-radius);
    }

    /* Section spacing utility classes */
    .section-spacing {
      padding: var(--section-spacing) 0;
    }

    .section-spacing-top {
      padding-top: var(--section-spacing);
    }

    .section-spacing-bottom {
      padding-bottom: var(--section-spacing);
    }
  </style>
<?php
}
add_action('wp_head', 'ahudimma_customizer_css');
