<?php
/**
 * Template Name: Contact Us
 * 
 * @package Ahudimma
 */

get_header();
?>

<main class="contact-page">

  <!-- Hero Section -->
  <section class="contact-hero">
    <div class="container">
      <h1><?php esc_html_e('Contact Us', 'ulo-ahudimma'); ?></h1>
      <p><?php esc_html_e('We\'re here to help. Get in touch with us today.', 'ulo-ahudimma'); ?></p>
    </div>
  </section>

  <!-- Contact Content -->
  <section class="contact-content">
    <div class="container">
      
      <div class="contact-layout">
        
        <!-- Contact Information -->
        <div class="contact-info">
          
          <div class="contact-info-card">
            <div class="info-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="info-content">
              <h3><?php esc_html_e('Our Address', 'ulo-ahudimma'); ?></h3>
              <p><?php echo esc_html(get_theme_mod('contact_address', '12 sancah close Abuja, Nigeria')); ?></p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="info-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="info-content">
              <h3><?php esc_html_e('Phone Number', 'ulo-ahudimma'); ?></h3>
              <p>
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '+234 903 4762 387'))); ?>">
                  <?php echo esc_html(get_theme_mod('contact_phone', '+234 812 345 6789')); ?>
                </a>
              </p>
              <?php 
              $emergency_phone = get_theme_mod('contact_emergency_phone');
              if ($emergency_phone) : 
              ?>
                <p class="emergency-line">
                  <strong><?php esc_html_e('Emergency:', 'ulo-ahudimma'); ?></strong>
                  <a href="tel:<?php echo esc_attr(str_replace(' ', '', $emergency_phone)); ?>">
                    <?php echo esc_html($emergency_phone); ?>
                  </a>
                </p>
              <?php endif; ?>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="info-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="info-content">
              <h3><?php esc_html_e('Email Address', 'ulo-ahudimma'); ?></h3>
              <p>
                <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'EdesCare@gmail.com')); ?>">
                  <?php echo esc_html(get_theme_mod('contact_email', 'emekasworke@gmail.com')); ?>
                </a>
              </p>
            </div>
          </div>

          <div class="contact-info-card">
            <div class="info-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="info-content">
              <h3><?php esc_html_e('Working Hours', 'ulo-ahudimma'); ?></h3>
              <?php 
              $working_hours = get_theme_mod('contact_working_hours', 
                "Monday - Friday: 8:00 AM - 6:00 PM\nSaturday: 9:00 AM - 4:00 PM\nSunday: Closed"
              );
              echo '<p>' . nl2br(esc_html($working_hours)) . '</p>';
              ?>
            </div>
          </div>

          <!-- Social Links (Optional) -->
          <?php if (has_nav_menu('social')) : ?>
          <div class="contact-social">
            <h3><?php esc_html_e('Follow Us', 'ulo-ahudimma'); ?></h3>
            <?php
            wp_nav_menu(array(
              'theme_location' => 'social',
              'menu_class'     => 'social-links',
              'container'      => false,
              'depth'          => 1,
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span>',
            ));
            ?>
          </div>
          <?php endif; ?>

        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
          <div class="contact-form-header">
            <h2><?php esc_html_e('Send us a Message', 'ulo-ahudimma'); ?></h2>
            <p><?php esc_html_e('Fill out the form below and we\'ll get back to you as soon as possible.', 'ulo-ahudimma'); ?></p>
          </div>

          <?php
          // Show success message
          if (isset($_GET['contact']) && $_GET['contact'] === 'success') :
          ?>
            <div class="success-message">
              <strong><?php esc_html_e('Thank you!', 'ulo-ahudimma'); ?></strong>
              <?php esc_html_e('Your message has been sent successfully. We\'ll get back to you soon.', 'ulo-ahudimma'); ?>
            </div>
          <?php endif; ?>

          <?php
          // Show error message
          if (isset($_GET['contact']) && $_GET['contact'] === 'error') :
          ?>
            <div class="error-message">
              <strong><?php esc_html_e('Oops!', 'ulo-ahudimma'); ?></strong>
              <?php esc_html_e('Something went wrong. Please try again.', 'ulo-ahudimma'); ?>
            </div>
          <?php endif; ?>

          <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" class="contact-form" id="contact-form">
            
            <input type="hidden" name="action" value="submit_contact_form">
            <?php wp_nonce_field('submit_contact_nonce', 'contact_nonce'); ?>

            <div class="form-row">
              <div class="form-field">
                <label for="contact-name">
                  <?php esc_html_e('Your Name', 'ulo-ahudimma'); ?> 
                  <span class="required">*</span>
                </label>
                <input type="text" 
                       id="contact-name" 
                       name="contact_name" 
                       required
                       placeholder="<?php esc_attr_e('John Doe', 'ulo-ahudimma'); ?>">
              </div>

              <div class="form-field">
                <label for="contact-email">
                  <?php esc_html_e('Email Address', 'ulo-ahudimma'); ?> 
                  <span class="required">*</span>
                </label>
                <input type="email" 
                       id="contact-email" 
                       name="contact_email" 
                       required
                       placeholder="<?php esc_attr_e('john@example.com', 'ulo-ahudimma'); ?>">
              </div>
            </div>

            <div class="form-row">
              <div class="form-field">
                <label for="contact-phone">
                  <?php esc_html_e('Phone Number', 'ulo-ahudimma'); ?>
                </label>
                <input type="tel" 
                       id="contact-phone" 
                       name="contact_phone"
                       placeholder="<?php esc_attr_e('+234 903 4762 387', 'ulo-ahudimma'); ?>">
              </div>

              <div class="form-field">
                <label for="contact-subject">
                  <?php esc_html_e('Subject', 'ulo-ahudimma'); ?> 
                  <span class="required">*</span>
                </label>
                <select id="contact-subject" name="contact_subject" required>
                  <option value=""><?php esc_html_e('Select a subject', 'ulo-ahudimma'); ?></option>
                  <option value="general"><?php esc_html_e('General Inquiry', 'ulo-ahudimma'); ?></option>
                  <option value="appointment"><?php esc_html_e('Appointment Question', 'ulo-ahudimma'); ?></option>
                  <option value="services"><?php esc_html_e('Services Information', 'ulo-ahudimma'); ?></option>
                  <option value="billing"><?php esc_html_e('Billing Question', 'ulo-ahudimma'); ?></option>
                  <option value="feedback"><?php esc_html_e('Feedback', 'ulo-ahudimma'); ?></option>
                  <option value="other"><?php esc_html_e('Other', 'ulo-ahudimma'); ?></option>
                </select>
              </div>
            </div>

            <div class="form-field">
              <label for="contact-message">
                <?php esc_html_e('Your Message', 'ulo-ahudimma'); ?> 
                <span class="required">*</span>
              </label>
              <textarea id="contact-message" 
                        name="contact_message" 
                        rows="6" 
                        required
                        placeholder="<?php esc_attr_e('Tell us how we can help you...', 'ulo-ahudimma'); ?>"></textarea>
            </div>

            <button type="submit" class="btn btn-submit">
              <?php esc_html_e('Send Message', 'ulo-ahudimma'); ?>
            </button>

          </form>

        </div>

      </div>

    </div>
  </section>

  <!-- Map Section (Optional) -->
  <?php 
  $show_map = get_theme_mod('contact_show_map', true);
  $map_embed = get_theme_mod('contact_map_embed');
  
  if ($show_map && $map_embed) : 
  ?>
  <section class="contact-map">
    <div class="map-container">
      <?php echo wp_kses_post($map_embed); ?>
    </div>
  </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>