<?php

/**
 * Single Department Template
 *
 * @package Ahudimma
 */

get_header();

/* ACF Fields */
$banner        = get_field('department_banner');
$intro         = get_field('department_intro');
$services      = get_field('services_offered');
$schedule      = get_field('department_schedule');
$contact       = get_field('department_phone');
$info          = get_field('department_info');
?>

<main class="single-department">

  <!-- Department Banner -->
  <?php if ($banner) : ?>
    <section class="department-hero" style="background-image: url('<?php echo esc_url($banner['url']); ?>');">
      <div class="overlay">
        <div class="container">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <section class="department-body">
    <div class="container">

      <!-- Intro -->
      <?php if ($intro) : ?>
        <section class="department-intro">
          <h2>About the Department</h2>
          <p><?php echo esc_html($intro); ?></p>
        </section>
      <?php endif; ?>

      <!-- Services -->
      <?php if ($services) : ?>
        <section class="department-services">
          <h2>Services Offered</h2>
          <?php if ($services) {
            $items = array_filter(array_map('trim', explode("\n", $services)));

            echo '<ul class="services-list">';
            foreach ($items as $item) {
              echo '<li>' . esc_html($item) . '</li>';
            }
            echo '</ul>';
          } ?>


        </section>
      <?php endif; ?>

      <!-- Consultation Schedule -->
      <?php if ($schedule) : ?>
        <section class="department-schedule">
          <h2>Consultation Schedule</h2>
          <?php echo wp_kses_post($schedule); ?>
        </section>
      <?php endif; ?>

      <!-- Department Info -->
      <?php if ($info) : ?>
        <section class="department-info">
          <h2>Department Information</h2>
          <?php echo wp_kses_post($info); ?>
        </section>
      <?php endif; ?>

      <!-- Contact -->
      <?php if ($contact) : ?>
        <section class="department-contact">
          <h2>Contact</h2>
          <?php echo wp_kses_post($contact); ?>
        </section>
      <?php endif; ?>

      <!-- Related Doctors -->
      <section class="department-doctors">
        <h2>Doctors in this Department</h2>

        <?php
        $doctors = new WP_Query([
          'post_type'  => 'doctor',
          'posts_per_page' => -1,
          'meta_query' => [
            [
              'key'     => 'doctor_department',
              'value'   => get_the_ID(),
              'compare' => 'LIKE'
            ]
          ]
        ]);
        ?>

        <?php if ($doctors->have_posts()) : ?>
          <div class="doctor-grid">

            <?php while ($doctors->have_posts()) : $doctors->the_post(); ?>

              <article class="doctor-card">
                <h3>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h3>

                <p><?php the_field('specialty'); ?></p>
              </article>

            <?php endwhile;
            wp_reset_postdata(); ?>

          </div>
        <?php else : ?>
          <p>No doctors assigned to this department yet.</p>
        <?php endif; ?>

      </section>

    </div>
  </section>

</main>

<?php
get_footer();
