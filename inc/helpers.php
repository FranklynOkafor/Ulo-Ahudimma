<?php
/**
 * Homepage Functions
 * Add these to your functions.php
 * 
 * @package Ahudimma
 */

// ========================================
// 1. ENQUEUE HOMEPAGE ASSETS
// ========================================

function ahudimma_enqueue_homepage_assets() {
    // Only load on homepage
    if (is_front_page() || is_page_template('front-page.php')) {
        
        // Enqueue CSS
        wp_enqueue_style(
            'homepage-styles',
            get_template_directory_uri() . '/assets/css/homepage-styles.css',
            array(),
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'ahudimma_enqueue_homepage_assets');

// ========================================
// 2. ADD HOMEPAGE CUSTOMIZER SETTINGS
// ========================================

function ahudimma_homepage_customizer_settings($wp_customize) {
    
    // Add section for Homepage Settings
    $wp_customize->add_section('ahudimma_homepage', array(
        'title'    => __('Homepage Settings', 'ulo-ahudimma'),
        'priority' => 132,
    ));
    
    // ==========================================
    // HERO SECTION
    // ==========================================
    
    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Quality Healthcare For You & Your Family',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => __('Hero Title', 'ulo-ahudimma'),
        'section' => 'ahudimma_homepage',
        'type'    => 'text',
    ));
    
    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Providing compassionate, expert care with state-of-the-art facilities and a dedicated team of healthcare professionals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => __('Hero Subtitle', 'ulo-ahudimma'),
        'section' => 'ahudimma_homepage',
        'type'    => 'textarea',
    ));
    
    // Hero Background Image
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image', array(
        'label'       => __('Hero Background Image', 'ulo-ahudimma'),
        'description' => __('Optional background image for hero section', 'ulo-ahudimma'),
        'section'     => 'ahudimma_homepage',
    )));
    
    // ==========================================
    // ABOUT SECTION
    // ==========================================
    
    // About Intro
    $wp_customize->add_setting('about_intro', array(
        'default'           => 'We are dedicated to providing the highest quality healthcare services to our community.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('about_intro', array(
        'label'   => __('About Section Text', 'ulo-ahudimma'),
        'section' => 'ahudimma_homepage',
        'type'    => 'textarea',
    ));
    
    // About Home Image
    $wp_customize->add_setting('about_home_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_home_image', array(
        'label'   => __('About Section Image', 'ulo-ahudimma'),
        'section' => 'ahudimma_homepage',
    )));
}
add_action('customize_register', 'ahudimma_homepage_customizer_settings');

// ========================================
// 3. OUTPUT HERO BACKGROUND IMAGE CSS
// ========================================

function ahudimma_hero_background_css() {
    $hero_bg = get_theme_mod('hero_background_image');
    
    if ($hero_bg && is_front_page()) :
    ?>
    <style>
        .hero-section {
            background-image: url('<?php echo esc_url($hero_bg); ?>');
            background-size: cover;
            background-position: center;
        }
        .hero-section::before {
            background: rgba(10, 31, 61, 0.7);
        }
    </style>
    <?php
    endif;
}
add_action('wp_head', 'ahudimma_hero_background_css');










function ahudimma_handle_appointment_submission()
{

  if (
    ! isset($_POST['appointment_nonce']) ||
    ! wp_verify_nonce($_POST['appointment_nonce'], 'submit_appointment_nonce')
  ) {
    wp_die('Security check failed');
  }

  $appointment_id = wp_insert_post([
    'post_type'   => 'appointment',
    'post_title' => 'Appointment — ' . sanitize_text_field($_POST['patient_name']),
    'post_status' => 'pending',
  ]);

  if ($appointment_id) {
    update_field('patient_name', sanitize_text_field($_POST['patient_name']), $appointment_id);
    update_field('patient_phone', sanitize_text_field($_POST['patient_phone']), $appointment_id);
    update_field('patient_email', sanitize_email($_POST['patient_email']), $appointment_id);
    update_field('appointment_department', intval($_POST['appointment_department']), $appointment_id);
    update_field('appointment_date', $_POST['appointment_date'], $appointment_id);
    update_field('appointment_time', $_POST['appointment_time'], $appointment_id);
    update_field('appointment_notes', sanitize_textarea_field($_POST['appointment_notes']), $appointment_id);
    update_field(
      'appointment_doctor',
      intval($_POST['appointment_doctor']),
      $appointment_id
    );
    $patient_email = sanitize_email($_POST['patient_email']);
    wp_mail(
      $patient_email, 
      'Appointment Request Recieved', 
      "Hello,
      Thank you for booking your appointment with us 
      Your request has been recieved and is currently pending conformation. We will notify you once it has been reviewed.
      
      Best Regards,
      Ulo Ahudimma.
      
      
      
      Dear WP SMTP... please Work ohh, I don't know if I have it in me for another iteration. Thank you."
    );
  }

  wp_redirect(home_url('/book-appointment'));
  exit;
}

add_action('admin_post_submit_appointment', 'ahudimma_handle_appointment_submission');
add_action('admin_post_nopriv_submit_appointment', 'ahudimma_handle_appointment_submission');


function ahudimma_send_conformation_email($new_status, $old_status, $post){
  if ($post -> post_type !== 'appointment') {
    return;
  }
  if ($old_status !== 'pending' || $new_status !== 'publish') {
    return;
  }

  $patient_email = get_field('patient_email', $post -> ID);
  $department_id = get_field('appointment_department', $post -> ID);
  $doctor_id = get_field('appointment_doctor', $post -> ID);
  $date = get_field('appointment_date', $post -> ID);
  $time = get_field('appointment_time', $post -> ID);
  
  $department = $department_id ? get_the_title($department_id) : 'N/A';
  $doctor = $doctor_id ? get_the_title($doctor_id) : 'To be assigned';

  wp_mail(
    $patient_email,
    'Appointment Confirmed',
    "Hello
    Your appointment has been confirmed.
    Department: {$department}
    Doctor: {$doctor}
    Date: {$date}
    Time: {$time}
    Please to avoid complications and so that we can do the registrations sharp sharp, arrive 15 mins early.
    Best Regards, 
    Me.
    "
  );
  
  
}

add_action('transition_post_status', 'ahudimma_send_conformation_email', 10, 3);


function ahudimma_load_doctors_by_department()
{

  check_ajax_referer('load_doctors_nonce', 'nonce');

  $department_id = intval($_POST['department_id']);

  $doctors = new WP_Query([
    'post_type'      => 'doctor', // confirm slug
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => [
      [
        'key'     => 'doctor_department',
        'value'   => $department_id,
        'compare' => 'LIKE'
      ]
    ]
  ]);

  $results = [];



  if ($doctors->have_posts()) {
    while ($doctors->have_posts()) {
      $doctors->the_post();
      $results[] = [
        'id'   => get_the_ID(),
        'name' => get_the_title()
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success($results);
}

add_action('wp_ajax_load_doctors_by_department', 'ahudimma_load_doctors_by_department');
add_action('wp_ajax_nopriv_load_doctors_by_department', 'ahudimma_load_doctors_by_department');



