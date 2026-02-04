<?php
/**
 * Template for displaying single Doctor post
 * Enhanced version with breadcrumbs, share buttons, and related doctors
 * 
 * @package Ahudimma
 */

get_header(); 
?>

<div class="single-doctor-container">
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <!-- Breadcrumbs -->
    <div class="doctor-breadcrumbs">
      <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'ulo-ahudimma'); ?></a>
      <span>/</span>
      <a href="<?php echo esc_url(get_post_type_archive_link('doctor')); ?>"><?php esc_html_e('Doctors', 'ulo-ahudimma'); ?></a>
      <span>/</span>
      <span class="current"><?php the_title(); ?></span>
    </div>

    <article id="doctor-<?php the_ID(); ?>" <?php post_class('doctor-profile'); ?>>

      <!-- Doctor Photo -->
      <div class="doctor-photo">
        <?php
        if (has_post_thumbnail()) {
          the_post_thumbnail('large');
        } else {
          echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-doctor.jpg') . '" alt="' . esc_attr(get_the_title()) . '">';
        }
        ?>
      </div>

      <!-- Doctor Details -->
      <div class="doctor-details">
        
        <h1><?php the_title(); ?></h1>

        <div class="doctor-info-list">
          
          <?php if ($specialty = get_field('doctor_specialty')) : ?>
            <p>
              <strong><?php esc_html_e('Specialty:', 'ulo-ahudimma'); ?></strong>
              <span><?php echo esc_html($specialty); ?></span>
            </p>
          <?php endif; ?>

          <?php if ($qualification = get_field('doctor_qualification')) : ?>
            <p>
              <strong><?php esc_html_e('Qualification(s):', 'ulo-ahudimma'); ?></strong>
              <span><?php echo esc_html($qualification); ?></span>
            </p>
          <?php endif; ?>

          <?php if ($experience = get_field('years_of_experience')) : ?>
            <p>
              <strong><?php esc_html_e('Experience:', 'ulo-ahudimma'); ?></strong>
              <span><?php echo esc_html($experience); ?> years</span>
            </p>
          <?php endif; ?>

          <?php if ($consultation = get_field('doctor_time')) : ?>
            <p>
              <strong><?php esc_html_e('Consultation Time:', 'ulo-ahudimma'); ?></strong>
              <span><?php echo esc_html($consultation); ?></span>
            </p>
          <?php endif; ?>

          <?php if ($contact = get_field('doctor_number')) : ?>
            <p>
              <strong><?php esc_html_e('Contact:', 'ulo-ahudimma'); ?></strong>
              <span>
                <a href="tel:<?php echo esc_attr(str_replace(' ', '', $contact)); ?>">
                  <?php echo esc_html($contact); ?>
                </a>
              </span>
            </p>
          <?php endif; ?>

          <?php if ($email = get_field('doctor_email')) : ?>
            <p>
              <strong><?php esc_html_e('Email:', 'ulo-ahudimma'); ?></strong>
              <span>
                <a href="mailto:<?php echo esc_attr($email); ?>">
                  <?php echo esc_html($email); ?>
                </a>
              </span>
            </p>
          <?php endif; ?>

          <?php if ($department = get_field('doctor_department')) : ?>
            <p>
              <strong><?php esc_html_e('Department:', 'ulo-ahudimma'); ?></strong>
              <span>
                <a href="<?php echo esc_url(get_permalink($department->ID)); ?>">
                  <?php echo esc_html($department->post_title); ?>
                </a>
              </span>
            </p>
          <?php endif; ?>

        </div>

        <!-- Doctor Bio -->
        <?php if (get_the_content()) : ?>
          <div class="doctor-bio">
            <?php the_content(); ?>
          </div>
        <?php endif; ?>

        <!-- Book Appointment Button -->
        <a href="<?php echo esc_url(site_url('/book-appointment')); ?>" class="btn-book-appointment">
          <?php esc_html_e('Book Appointment', 'ulo-ahudimma'); ?>
        </a>

      </div>

    </article>

  <?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>