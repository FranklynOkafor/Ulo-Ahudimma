<?php
/**
 * Template Name: About Us
 * 
 * @package Ahudimma
 */

get_header();
?>

<main class="about-page">

  <!-- Hero Section -->
  <section class="about-hero">
    <div class="container">
      <h1 class="change"><?php esc_html_e('About Us', 'ulo-ahudimma'); ?></h1>
      <p><?php esc_html_e('Committed to excellence in healthcare and patient well-being', 'ulo-ahudimma'); ?></p>
    </div>
  </section>

  <!-- Our Story Section -->
  <section class="our-story">
    <div class="container">
      <div class="story-content">
        <div class="story-text">
          <h2><?php esc_html_e('Our Story', 'ulo-ahudimma'); ?></h2>
          <?php
          $story_content = get_theme_mod('about_story', 
            '<p>At Ụlọ Ahụ̣dịmma, we are dedicated to providing the highest quality healthcare services to our community. Our mission is to improve the health and well-being of our patients through compassionate care, cutting-edge technology, and a commitment to excellence.</p>
            <p>Founded with a vision to be a trusted healthcare institution, we have grown to become a leading provider of medical services. Our team of experienced doctors, nurses, and healthcare professionals work tirelessly to ensure that every patient receives personalized, comprehensive care.</p>'
          );
          echo wp_kses_post($story_content);
          ?>
        </div>
        <div class="story-image">
          <?php
          $story_image = get_theme_mod('about_story_image');
          if ($story_image) :
          ?>
            <img src="<?php echo esc_url($story_image); ?>" 
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

  <!-- Mission, Vision, Values -->
  <section class="mission-vision-values">
    <div class="container">
      
      <div class="mvv-grid">
        
        <!-- Mission -->
        <div class="mvv-card mission-card">
          <div class="mvv-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Our Mission', 'ulo-ahudimma'); ?></h3>
          <p><?php echo esc_html(get_theme_mod('about_mission', 'To improve the health and well-being of our patients through compassionate care, cutting-edge technology, and a commitment to excellence.')); ?></p>
        </div>

        <!-- Vision -->
        <div class="mvv-card vision-card">
          <div class="mvv-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Our Vision', 'ulo-ahudimma'); ?></h3>
          <p><?php echo esc_html(get_theme_mod('about_vision', 'To be a trusted healthcare institution recognized for excellence, innovation, and patient-centered care.')); ?></p>
        </div>

        <!-- Values -->
        <div class="mvv-card values-card">
          <div class="mvv-icon">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Our Values', 'ulo-ahudimma'); ?></h3>
          <p><?php echo esc_html(get_theme_mod('about_values', 'Compassion, Excellence, Integrity, Innovation, and Patient-Centered Care guide everything we do.')); ?></p>
        </div>

      </div>
    </div>
  </section>

  <!-- Statistics Section -->
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        
        <div class="stat-card">
          <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_patients', '20,000+')); ?></div>
          <div class="stat-label"><?php esc_html_e('Happy Patients', 'ulo-ahudimma'); ?></div>
        </div>

        <div class="stat-card">
          <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_doctors', '200+')); ?></div>
          <div class="stat-label"><?php esc_html_e('Medical Doctors', 'ulo-ahudimma'); ?></div>
        </div>

        <div class="stat-card">
          <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_awards', '100+')); ?></div>
          <div class="stat-label"><?php esc_html_e('Awards Won', 'ulo-ahudimma'); ?></div>
        </div>

        <div class="stat-card">
          <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_staff', '500+')); ?></div>
          <div class="stat-label"><?php esc_html_e('Staff Members', 'ulo-ahudimma'); ?></div>
        </div>

      </div>
    </div>
  </section>

  <!-- Why Choose Us Section -->
  <section class="why-choose-us">
    <div class="container">
      
      <div class="section-header">
        <h2><?php esc_html_e('Why Choose Us', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('We are committed to providing exceptional healthcare services', 'ulo-ahudimma'); ?></p>
      </div>

      <div class="features-grid">
        
        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Experienced Team', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Our medical professionals have decades of combined experience in providing quality healthcare.', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Modern Equipment', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('State-of-the-art medical technology and equipment for accurate diagnosis and treatment.', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('24/7 Emergency', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Round-the-clock emergency services to ensure you get help when you need it most.', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Patient-Centered Care', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('We put our patients first, providing compassionate and personalized healthcare services.', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Quality Standards', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('We maintain the highest standards of quality and safety in all our healthcare services.', 'ulo-ahudimma'); ?></p>
        </div>

        <div class="feature-card">
          <div class="feature-icon">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3><?php esc_html_e('Comprehensive Services', 'ulo-ahudimma'); ?></h3>
          <p><?php esc_html_e('Wide range of medical specialties and services under one roof for your convenience.', 'ulo-ahudimma'); ?></p>
        </div>

      </div>
    </div>
  </section>

  <!-- Team Section (Optional) -->
  <section class="team-section">
    <div class="container">
      
      <div class="section-header">
        <h2><?php esc_html_e('Meet Our Leadership', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('Experienced leaders dedicated to healthcare excellence', 'ulo-ahudimma'); ?></p>
      </div>

      <?php
      // Query featured doctors or leadership
      $leadership = new WP_Query(array(
        'post_type'      => 'doctor',
        'posts_per_page' => 4,
        'meta_query'     => array(
          array(
            'key'     => 'is_leadership',
            'value'   => '1',
            'compare' => '='
          )
        )
      ));

      if ($leadership->have_posts()) :
      ?>
        <div class="team-grid">
          <?php while ($leadership->have_posts()) : $leadership->the_post(); ?>
            <div class="team-member">
              <div class="team-photo">
                <?php 
                if (has_post_thumbnail()) {
                  the_post_thumbnail('medium');
                } else {
                  echo '<div class="placeholder-avatar">👤</div>';
                }
                ?>
              </div>
              <div class="team-info">
                <h3><?php the_title(); ?></h3>
                <p class="team-role"><?php echo esc_html(get_field('doctor_specialty')); ?></p>
                <a href="<?php the_permalink(); ?>" class="team-link">
                  <?php esc_html_e('View Profile', 'ulo-ahudimma'); ?> →
                </a>
              </div>
            </div>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php else : ?>
        <p class="no-team"><?php esc_html_e('Our leadership team information will be available soon.', 'ulo-ahudimma'); ?></p>
      <?php endif; ?>

      <div class="team-cta">
        <a href="<?php echo esc_url(get_post_type_archive_link('doctor')); ?>" class="btn">
          <?php esc_html_e('View All Doctors', 'ulo-ahudimma'); ?>
        </a>
      </div>

    </div>
  </section>

  <!-- Call to Action -->
  <section class="about-cta">
    <div class="container">
      <div class="cta-content">
        <h2 class="change"><?php esc_html_e('Ready to Experience Quality Healthcare?', 'ulo-ahudimma'); ?></h2>
        <p><?php esc_html_e('Book an appointment with us today and let our experienced team take care of your health needs.', 'ulo-ahudimma'); ?></p>
        <div class="cta-buttons">
          <a href="<?php echo esc_url(site_url('/book-appointment')); ?>" class="btn btn-primary">
            <?php esc_html_e('Book Appointment', 'ulo-ahudimma'); ?>
          </a>
          <a href="<?php echo esc_url(site_url('/contact')); ?>" class="btn btn-secondary">
            <?php esc_html_e('Contact Us', 'ulo-ahudimma'); ?>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>  