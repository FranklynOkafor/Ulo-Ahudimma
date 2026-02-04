<?php get_header(); ?>

<div class="single-doctor-container">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <div class="doctor-profile">

        <!-- Doctor Photo -->
        <div class="doctor-photo">
          <?php
          if (has_post_thumbnail()) {
            the_post_thumbnail('medium');
          } else {
            echo '<img src="' . get_template_directory_uri() . '/images/default-doctor.jpg" alt="Doctor">';
          }
          ?>
        </div>

        <!-- Doctor Details -->
        <div class="doctor-details">
          <h1><?php the_title(); ?></h1>

          <?php if ($specialty = get_field('doctor_specialty')) : ?>
            <p><strong>Specialty:</strong> <?php echo esc_html($specialty); ?></p>
          <?php endif; ?>

          <?php if ($qualification = get_field('doctor_qualification')) : ?>
            <p><strong>Qualification(s):</strong> <?php echo esc_html($qualification); ?></p>
          <?php endif; ?>

          <?php if ($experience = get_field('years_of_experience')) : ?>
            <p><strong>Experience:</strong> <?php echo esc_html($experience); ?> years</p>
          <?php endif; ?>

          <?php if ($consultation = get_field('doctor_time')) : ?>
            <p><strong>Consultation Time:</strong> <?php echo esc_html($consultation); ?></p>
          <?php endif; ?>

          <?php if ($contact = get_field('doctor_number')) : ?>
            <p><strong>Contact:</strong> <?php echo esc_html($contact); ?></p>
          <?php endif; ?>

          <?php if ($email = get_field('doctor_email')) : ?>
            <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
          <?php endif; ?>

          <?php if ($department = get_field('doctor_department')) : ?>
            <p><strong>Department:</strong>
              <a href="<?php echo get_permalink($department->ID); ?>">
                <?php echo esc_html($department->post_title); ?>
              </a>
            </p>
          <?php endif; ?>

          <!-- Optional Bio / Description -->
          <div class="doctor-bio">
            <?php the_content(); ?>
          </div>

          <!-- Book Appointment Button -->
          <a href="<?php echo site_url('/book-appointment'); ?>" class="btn-book-appointment">Book Appointment</a>
        </div>

      </div>

  <?php endwhile;
  endif; ?>

</div>

<?php get_footer(); ?>