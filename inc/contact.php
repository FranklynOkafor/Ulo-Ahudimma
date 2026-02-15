<?php
/**
 * Contact Form Functions
 * Add these to your functions.php
 * 
 * @package Ahudimma
 */

// ========================================
// 1. ENQUEUE CONTACT PAGE ASSETS
// ========================================

function ahudimma_enqueue_contact_assets() {
    // Only load on contact page
    if (is_page('contact') || is_page_template('page-contact.php')) {
        
        // Enqueue CSS
        wp_enqueue_style(
            'contact-page',
            get_template_directory_uri() . '/assets/css/contact-page-styles.css',
            array(),
            '1.0.0'
        );
        
        // Enqueue JavaScript
        wp_enqueue_script(
            'contact-form',
            get_template_directory_uri() . '/assets/js/contact-form.js',
            array(),
            '1.0.0',
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'ahudimma_enqueue_contact_assets');

// ========================================
// 2. HANDLE CONTACT FORM SUBMISSION
// ========================================

function ahudimma_handle_contact_submission() {
    // Verify nonce
    if (!isset($_POST['contact_nonce']) || 
        !wp_verify_nonce($_POST['contact_nonce'], 'submit_contact_nonce')) {
        wp_die('Security check failed');
    }
    
    // Honeypot spam check
    if (!empty($_POST['website'])) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }
    
    // Sanitize form data
    $name    = sanitize_text_field($_POST['contact_name']);
    $email   = sanitize_email($_POST['contact_email']);
    $phone   = sanitize_text_field($_POST['contact_phone']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validate required fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }
    
    // Validate email
    if (!is_email($email)) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }
    
    // Prepare email content
    $to = get_option('admin_email');
    
    // You can also add a dedicated contact email
    $contact_email = get_theme_mod('contact_email');
    if ($contact_email && is_email($contact_email)) {
        $to = $contact_email;
    }
    
    // Email subject
    $subject_map = array(
        'general'     => 'General Inquiry',
        'appointment' => 'Appointment Question',
        'services'    => 'Services Information',
        'billing'     => 'Billing Question',
        'feedback'    => 'Feedback',
        'other'       => 'Other'
    );
    
    $email_subject = sprintf(
        '[%s] Contact Form: %s',
        get_bloginfo('name'),
        isset($subject_map[$subject]) ? $subject_map[$subject] : $subject
    );
    
    // Email body
    $email_body = sprintf(
        "You have received a new message from your website contact form.\n\n" .
        "Name: %s\n" .
        "Email: %s\n" .
        "Phone: %s\n" .
        "Subject: %s\n\n" .
        "Message:\n%s\n\n" .
        "---\n" .
        "This email was sent from the contact form on %s\n" .
        "Submitted on: %s",
        $name,
        $email,
        $phone ?: 'Not provided',
        isset($subject_map[$subject]) ? $subject_map[$subject] : $subject,
        $message,
        get_bloginfo('url'),
        current_time('F j, Y g:i A')
    );
    
    // Email headers
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    // Send email
    $sent = wp_mail($to, $email_subject, $email_body, $headers);
    
    if ($sent) {
        // Optional: Send auto-reply to user
        ahudimma_send_contact_auto_reply($name, $email, $subject);
        
        // Optional: Save to database
        ahudimma_save_contact_submission($name, $email, $phone, $subject, $message);
        
        // Redirect to success
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
        exit;
    } else {
        // Redirect to error
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }
}
add_action('admin_post_submit_contact_form', 'ahudimma_handle_contact_submission');
add_action('admin_post_nopriv_submit_contact_form', 'ahudimma_handle_contact_submission');

// ========================================
// 3. SEND AUTO-REPLY TO USER (Optional)
// ========================================

function ahudimma_send_contact_auto_reply($name, $email, $subject) {
    // Auto-reply subject
    $reply_subject = sprintf(
        'Thank you for contacting %s',
        get_bloginfo('name')
    );
    
    // Auto-reply body
    $reply_body = sprintf(
        "Dear %s,\n\n" .
        "Thank you for reaching out to us. We have received your message regarding '%s'.\n\n" .
        "Our team will review your inquiry and get back to you as soon as possible, typically within 24-48 hours.\n\n" .
        "If your matter is urgent, please call us at %s.\n\n" .
        "Best regards,\n%s Team",
        $name,
        $subject,
        get_theme_mod('contact_phone', ''),
        get_bloginfo('name')
    );
    
    // Headers
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>'
    );
    
    // Send
    wp_mail($email, $reply_subject, $reply_body, $headers);
}

// ========================================
// 4. SAVE CONTACT SUBMISSION TO DATABASE (Optional)
// ========================================

function ahudimma_save_contact_submission($name, $email, $phone, $subject, $message) {
    // Create a custom post type for contact submissions
    $post_id = wp_insert_post(array(
        'post_type'   => 'contact_submission',
        'post_title'  => sprintf('Contact from %s - %s', $name, current_time('Y-m-d H:i')),
        'post_status' => 'publish',
        'post_author' => 1
    ));
    
    if ($post_id) {
        update_post_meta($post_id, 'contact_name', $name);
        update_post_meta($post_id, 'contact_email', $email);
        update_post_meta($post_id, 'contact_phone', $phone);
        update_post_meta($post_id, 'contact_subject', $subject);
        update_post_meta($post_id, 'contact_message', $message);
        update_post_meta($post_id, 'contact_ip', $_SERVER['REMOTE_ADDR']);
        update_post_meta($post_id, 'contact_status', 'unread');
    }
}

// ========================================
// 5. REGISTER CONTACT SUBMISSION POST TYPE (Optional)
// ========================================

function ahudimma_register_contact_submission_post_type() {
    $labels = array(
        'name'               => __('Contact Submissions', 'ulo-ahudimma'),
        'singular_name'      => __('Contact Submission', 'ulo-ahudimma'),
        'menu_name'          => __('Contact Submissions', 'ulo-ahudimma'),
        'all_items'          => __('All Submissions', 'ulo-ahudimma'),
        'view_item'          => __('View Submission', 'ulo-ahudimma'),
        'search_items'       => __('Search Submissions', 'ulo-ahudimma'),
        'not_found'          => __('No submissions found', 'ulo-ahudimma'),
    );
    
    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'menu_position'       => 27,
        'menu_icon'           => 'dashicons-email-alt',
        'supports'            => array('title'),
        'show_in_rest'        => false,
    );
    
    register_post_type('contact_submission', $args);
}
// Uncomment to activate:
// add_action('init', 'ahudimma_register_contact_submission_post_type');

// ========================================
// 6. CONFIGURE WP_MAIL (Enhanced Email Delivery)
// ========================================

/**
 * Set email from name
 */
function ahudimma_wp_mail_from_name($name) {
    return get_bloginfo('name');
}
add_filter('wp_mail_from_name', 'ahudimma_wp_mail_from_name');

/**
 * Set email from address
 * Note: Using admin_email is safe, but you can change this
 * to a custom email like noreply@yourdomain.com
 */
function ahudimma_wp_mail_from($email) {
    // Get site domain
    $sitename = strtolower($_SERVER['SERVER_NAME']);
    if (substr($sitename, 0, 4) == 'www.') {
        $sitename = substr($sitename, 4);
    }
    
    // Use noreply@yourdomain.com format
    $from_email = 'noreply@' . $sitename;
    
    // Return custom email or default admin email
    return $from_email;
}
// Uncomment to use custom from address:
// add_filter('wp_mail_from', 'ahudimma_wp_mail_from');

/**
 * Set email content type to HTML (if needed)
 */
function ahudimma_wp_mail_content_type() {
    return 'text/html';
}
// Uncomment if you want HTML emails:
// add_filter('wp_mail_content_type', 'ahudimma_wp_mail_content_type');

// ========================================
// 7. ADD CUSTOMIZER SETTINGS FOR CONTACT INFO
// ========================================

function ahudimma_contact_customizer_settings($wp_customize) {
    // Add section
    $wp_customize->add_section('ahudimma_contact_settings', array(
        'title'    => __('Contact Page Settings', 'ulo-ahudimma'),
        'priority' => 130,
    ));
    
    // Emergency Phone
    $wp_customize->add_setting('contact_emergency_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_emergency_phone', array(
        'label'   => __('Emergency Phone Number', 'ulo-ahudimma'),
        'section' => 'ahudimma_contact_settings',
        'type'    => 'text',
    ));
    
    // Working Hours
    $wp_customize->add_setting('contact_working_hours', array(
        'default'           => "Monday - Friday: 8:00 AM - 6:00 PM\nSaturday: 9:00 AM - 4:00 PM\nSunday: Closed",
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('contact_working_hours', array(
        'label'   => __('Working Hours', 'ulo-ahudimma'),
        'section' => 'ahudimma_contact_settings',
        'type'    => 'textarea',
    ));
    
    // Show Map
    $wp_customize->add_setting('contact_show_map', array(
        'default'           => true,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('contact_show_map', array(
        'label'   => __('Show Map', 'ulo-ahudimma'),
        'section' => 'ahudimma_contact_settings',
        'type'    => 'checkbox',
    ));
    
    // Map Embed Code
    $wp_customize->add_setting('contact_map_embed', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('contact_map_embed', array(
        'label'       => __('Google Maps Embed Code', 'ulo-ahudimma'),
        'description' => __('Paste the iframe embed code from Google Maps', 'ulo-ahudimma'),
        'section'     => 'ahudimma_contact_settings',
        'type'        => 'textarea',
    ));
}
add_action('customize_register', 'ahudimma_contact_customizer_settings');

// ========================================
// 8. EMAIL DEBUGGING (For Development Only)
// ========================================

/**
 * Log email sending attempts
 * Uncomment during development to debug email issues
 */
/*
function ahudimma_log_email($args) {
    error_log('Email sent to: ' . $args['to']);
    error_log('Subject: ' . $args['subject']);
    return $args;
}
add_filter('wp_mail', 'ahudimma_log_email');
*/

/**
 * Catch email errors
 * Uncomment to see why emails are failing
 */
/*
function ahudimma_mail_failed($error) {
    error_log('Email Error: ' . $error->get_error_message());
}
add_action('wp_mail_failed', 'ahudimma_mail_failed');
*/