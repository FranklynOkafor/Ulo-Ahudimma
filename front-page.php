<?php
/**
 * Template Name: Homepage
 * 
 * @package Ahudimma
 */

get_header();
?>

<main class="homepage">

  <!-- Hero Section -->
  <section class="hero-section">
    <div class="hero-overlay"></div>
    <div class="container">
      <div class="hero-content">
        <h1 class="hero-title">
          <?php echo esc_html(get_theme_mod('hero_title', 'Quality Healthcare For You & Your Family')); ?>
        </h1>
        <p class="hero-subtitle">
          <?php echo esc_html(get_theme_mod('hero_subtitle', 'Providing compassionate, expert care with state-of-the-art facilities and a dedicated team of healthcare professionals.')); ?>
        </p>
        <div class="hero-buttons">
          <a href="<?php echo esc_url(site_url('/book-appointment')); ?>" class="btn btn-primary">
            <?php esc_html_e('Book Appointment', 'ulo-ahudimma'); ?>
          </a>
          <a href="<?php echo esc_url(site_url('/about')); ?>" class="btn btn-secondary">
            <?php esc_html_e('Learn More', 'ulo-ahudimma'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features-section">
    <div class="container">
      <div class="features-grid">
        
        <div class="feature-item">
          <div class="feature-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('24/7 Emergency', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Round-the-clock emergency care services available', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Expert Doctors', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Highly qualified medical professionals', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Modern Equipment', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('State-of-the-art medical technology', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Patient Care', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Compassionate, personalized healthcare', 'ulo-ahudimma'); ?></p>
        </div>

      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="about-section">
    <div class="container">
      <div class="about-content">
        
        <div class="about-text">
          <span class="section-label"><?php esc_html_e('About Us', 'ulo-ahudimma'); ?></span>
          <h2><?php esc_html_e('Welcome to Our Healthcare Center', 'ulo-ahudimma'); ?></h2>
          <p>
            <?php echo esc_html(get_theme_mod('about_intro', 'We are dedicated to providing the highest quality healthcare services to our community. Our mission is to improve the health and well-being of our patients through compassionate care, cutting-edge technology, and a commitment to excellence.')); ?>
          </p>
          <ul class="about-features">
            <li><?php esc_html_e('Experienced Medical Professionals', 'ulo-ahudimma'); ?></li>
            <li><?php esc_html_e('Comprehensive Health Services', 'ulo-ahudimma'); ?></li>
            <li><?php esc_html_e('Patient-Centered Approach', 'ulo-ahudimma'); ?></li>
            <li><?php esc_html_e('Modern Healthcare Facility', 'ulo-ahudimma'); ?></li>
          </ul>
          <a href="<?php echo esc_url(site_url('/about')); ?>" class="btn btn-outline">
            <?php esc_html_e('Read More About Us', 'ulo-ahudimma'); ?>
          </a>
        </div>

        <div class="about-image">
          <?php
          $about_image = get_theme_mod('about_home_image');
          if ($about_image) :
          ?>
            <img src="<?php echo esc_url($about_image); ?>" 
                 alt="<?php esc_attr_e('Our Healthcare Facility', 'ulo-ahudimma'); ?>"
                 loading="lazy">
          <?php else : ?>
            <div class="placeholder-image">
              <span>🏥</span>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>

  <!-- Services/Departments Section -->
  <section class="services-section">
    <div class="container">
      
      <div class="section-header">
        <span class="section-label"><?php esc_html_e('Our Departments', 'ulo-ahudimma'); ?></span>
        <h2><?php esc_html_e('Medical Services We Offer', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('Comprehensive healthcare services across multiple specialties', 'ulo-ahudimma'); ?></p>
      </div>

      <?php
      $departments = new WP_Query(array(
        'post_type'      => 'department',
        'posts_per_page' => 6,
        'orderby'        => 'menu_order',
        'order'          => 'ASC'
      ));

      if ($departments->have_posts()) :
      ?>
        <div class="services-grid">
          <?php while ($departments->have_posts()) : $departments->the_post(); 
            $icon = get_field('department_icon');
          ?>
            <div class="service-card">
              <?php if ($icon) : ?>
                <div class="service-icon">
                  <img src="<?php echo esc_url($icon['url']); ?>" 
                       alt="<?php echo esc_attr($icon['alt'] ?: get_the_title()); ?>">
                </div>
              <?php endif; ?>
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
              <a href="<?php the_permalink(); ?>" class="service-link">
                <?php esc_html_e('Learn More', 'ulo-ahudimma'); ?> →
              </a>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="services-cta">
          <a href="<?php echo esc_url(get_post_type_archive_link('department')); ?>" class="btn btn-primary">
            <?php esc_html_e('View All Departments', 'ulo-ahudimma'); ?>
          </a>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <!-- Doctors Section -->
  <section class="doctors-section">
    <div class="container">
      
      <div class="section-header">
        <span class="section-label"><?php esc_html_e('Our Team', 'ulo-ahudimma'); ?></span>
        <h2><?php esc_html_e('Meet Our Expert Doctors', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('Experienced healthcare professionals dedicated to your well-being', 'ulo-ahudimma'); ?></p>
      </div>

      <?php
      $doctors = new WP_Query(array(
        'post_type'      => 'doctor',
        'posts_per_page' => 4,
        'orderby'        => 'rand'
      ));

      if ($doctors->have_posts()) :
      ?>
        <div class="doctors-grid">
          <?php while ($doctors->have_posts()) : $doctors->the_post(); ?>
            <div class="doctor-card-home">
              <div class="doctor-photo-home">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('medium');
                } else {
                  echo '<div class="placeholder-avatar">👤</div>';
                }
                ?>
              </div>
              <div class="doctor-info-home">
                <h3><?php the_title(); ?></h3>
                <p class="doctor-specialty-home"><?php echo esc_html(get_field('doctor_specialty')); ?></p>
                <a href="<?php the_permalink(); ?>" class="doctor-link-home">
                  <?php esc_html_e('View Profile', 'ulo-ahudimma'); ?>
                </a>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>

        <div class="doctors-cta">
          <a href="<?php echo esc_url(get_post_type_archive_link('doctor')); ?>" class="btn btn-primary">
            <?php esc_html_e('View All Doctors', 'ulo-ahudimma'); ?>
          </a>
        </div>

      <?php endif; ?>

    </div>
  </section>

  <!-- CTA Section -->
  <section class="cta-section">
    <div class="cta-overlay"></div>
    <div class="container">
      <div class="cta-content">
        <h2><?php esc_html_e('Need Medical Assistance?', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('Book an appointment with our healthcare professionals today', 'ulo-ahudimma'); ?></p>
        <div class="cta-buttons">
          <a href="<?php echo esc_url(site_url('/book-appointment')); ?>" class="btn btn-white">
            <?php esc_html_e('Book Appointment', 'ulo-ahudimma'); ?>
          </a>
          <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('contact_phone', '+234 903 4762 387'))); ?>" class="btn btn-outline-white">
            <?php esc_html_e('Call Us Now', 'ulo-ahudimma'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>