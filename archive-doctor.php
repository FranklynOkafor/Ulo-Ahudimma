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
          get_template_part('template-parts/content/content', 'doctor')
        ?>

          

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