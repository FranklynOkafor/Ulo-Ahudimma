<?php

/**
 * Template for displaying Department Archive
 * 
 * @package Ahudimma
 */

get_header();
?>

<main class="department-archive">

  <!-- Page Header -->
  <section class="page-header">
    <div class="container">
      <h1><?php post_type_archive_title(); ?></h1>
      <p><?php esc_html_e('Explore our specialized medical departments committed to quality healthcare.', 'ulo-ahudimma'); ?></p>
    </div>
  </section>

  <!-- Department List -->
  <section class="department-list">
    <div class="container">

      <?php if (have_posts()) : ?>

        <div class="department-grid">

          <?php while (have_posts()) : the_post();
            $department_icon = get_field('department_icon');
            $is_featured = get_field('is_featured_department');
            $card_class = $is_featured ? 'department-card featured' : 'department-card';
          ?>

            <article id="department-<?php the_ID(); ?>" <?php post_class($card_class); ?>>

              <!-- Department Icon -->
              <a href="<?php the_permalink(); ?>"
                class="department-icon"
                aria-label="<?php echo esc_attr(sprintf(__('View %s department', 'ulo-ahudimma'), get_the_title())); ?>">
                <?php if ($department_icon) : ?>
                  <img src="<?php echo esc_url($department_icon['url']); ?>"
                    alt="<?php echo esc_attr($department_icon['alt'] ?: get_the_title() . ' icon'); ?>"
                    loading="lazy">
                <?php endif; ?>
              </a>

              <!-- Department Content -->
              <div class="department-content">

                <h2>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>

                <?php if (has_excerpt()) : ?>
                  <p class="department-excerpt">
                    <?php echo wp_trim_words(get_the_excerpt(), 18, '...'); ?>
                  </p>
                <?php else : ?>
                  <p class="department-excerpt">
                    <?php echo wp_trim_words(get_the_content(), 18, '...'); ?>
                  </p>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="btn">
                  <?php esc_html_e('View Department', 'ulo-ahudimma'); ?>
                </a>

              </div>

            </article>

          <?php endwhile; ?>

        </div>

        <!-- Pagination -->
        <?php
        the_posts_pagination(array(
          'mid_size'  => 2,
          'prev_text' => __('← Previous', 'ulo-ahudimma'),
          'next_text' => __('Next →', 'ulo-ahudimma'),
          'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'ulo-ahudimma') . ' </span>',
        ));
        ?>

      <?php else : ?>

        <!-- No Departments Found -->
        <p><?php esc_html_e('No departments found.', 'ulo-ahudimma'); ?></p>

      <?php endif; ?>

    </div>
  </section>

</main>

<?php
get_footer();
?>