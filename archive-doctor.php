<?php

/**
 * Template for displaying Doctor Archive
 * 
 * @package Ahudimma
 */

get_header();
?>

<div class="doctor-archive">
  <div class="container">

    <!-- Archive Header -->
    <header class="archive-header">
      <h1><?php post_type_archive_title(); ?></h1>

      <?php
      // Optional: Add archive description
      $post_type_obj = get_post_type_object('doctor');
      if ($post_type_obj && !empty($post_type_obj->description)) :
      ?>
        <p class="doctor-archive-description">
          <?php echo esc_html($post_type_obj->description); ?>
        </p>
      <?php endif; ?>
    </header>



    <div class="doctor-filters">

      <select name="department" id="department-filter">
        <option value="">All Departments</option>
        <?php
        $departments = get_posts(array(
          'post_type' => 'department',
          'posts_per_page' => -1,
          'orderby' => 'title',
          'order' => 'ASC'
        ));

        foreach ($departments as $dept) :
          $selected = (isset($_GET['department']) && $_GET['department'] == $dept->ID) ? 'selected' : '';
        ?>
          <option value="<?php echo esc_attr($dept->ID); ?>" <?php echo $selected; ?>>
            <?php echo esc_html($dept->post_title); ?>
          </option>
        <?php endforeach; ?>
      </select>

    </div>



    <?php if (have_posts()) : ?>

      <div class="doctor-grid doctor-results">

        <?php while (have_posts()) : the_post();

          // Get ACF fields
          $department = get_field('doctor_department');
          $specialty  = get_field('doctor_specialty');
          $experience = get_field('doctor_experience');

          // Featured image
          $photo = get_the_post_thumbnail_url(get_the_ID(), 'medium');

          // Default image fallback
          $default_image = get_template_directory_uri() . '/assets/images/default-doctor.jpg';
        ?>

          <article class="doctor-card" id="doctor-<?php the_ID(); ?>">

            <!-- Doctor Photo -->
            <div class="doctor-photo-wrapper">
              <?php if ($photo) : ?>
                <img src="<?php echo esc_url($photo); ?>"
                  alt="<?php echo esc_attr(get_the_title()); ?>"
                  class="doctor-photo"
                  loading="lazy">
              <?php else : ?>
                <img src="<?php echo esc_url($default_image); ?>"
                  alt="<?php echo esc_attr__('Default doctor photo', 'ulo-ahudimma'); ?>"
                  class="doctor-photo"
                  loading="lazy">
              <?php endif; ?>

              <?php
              // Optional: Add badge for featured doctors
              // Uncomment if you add a 'featured' custom field
              /*
                        if (get_field('is_featured')) : ?>
                            <span class="doctor-badge featured">Featured</span>
                        <?php endif;
                        */
              ?>
            </div>

            <!-- Doctor Info -->
            <div class="doctor-info">
              <h2 class="doctor-name">
                <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a>
              </h2>

              <?php if ($specialty) : ?>
                <p class="doctor-specialty"><?php echo esc_html($specialty); ?></p>
              <?php endif; ?>

              <?php if ($department) : ?>
                <p class="doctor-department">
                  <a href="<?php echo esc_url(get_permalink($department->ID)); ?>">
                    <?php echo esc_html($department->post_title); ?>
                  </a>
                </p>
              <?php endif; ?>

              <?php
              // Optional: Add years of experience
              if ($experience) :
              ?>
                <p class="doctor-experience">
                  <?php
                  printf(
                    esc_html__('%s years of experience', 'ulo-ahudimma'),
                    esc_html($experience)
                  );
                  ?>
                </p>
              <?php endif; ?>

              <?php
              // Optional: Add short excerpt
              if (has_excerpt()) :
              ?>
                <div class="doctor-excerpt">
                  <?php the_excerpt(); ?>
                </div>
              <?php endif; ?>
            </div>

            <!-- View Profile Button -->
            <a href="<?php the_permalink(); ?>" class="btn" aria-label="<?php echo esc_attr(sprintf(__('View profile of %s', 'ulo-ahudimma'), get_the_title())); ?>">
              <?php esc_html_e('View Profile', 'ulo-ahudimma'); ?>
            </a>

          </article>

        <?php endwhile; ?>

      </div> <!-- .doctor-grid -->

      <?php
      // Pagination
      the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('← Previous', 'ulo-ahudimma'),
        'next_text' => __('Next →', 'ulo-ahudimma'),
        'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'ulo-ahudimma') . ' </span>',
      ));
      ?>

    <?php else : ?>

      <!-- No Doctors Found -->
      <div class="no-doctors-found">
        <p><?php esc_html_e('No doctors found.', 'ulo-ahudimma'); ?></p>

        <?php if (is_search()) : ?>
          <p>
            <a href="<?php echo esc_url(get_post_type_archive_link('doctor')); ?>" class="btn">
              <?php esc_html_e('View All Doctors', 'ulo-ahudimma'); ?>
            </a>
          </p>
        <?php endif; ?>
      </div>

    <?php endif; ?>

  </div> <!-- .container -->
</div> <!-- .doctor-archive -->

<?php get_footer(); ?>