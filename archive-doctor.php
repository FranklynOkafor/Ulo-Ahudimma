<?php get_header(); ?>

<div class="doctor-archive">

  <h1>Our Doctors</h1>

  <?php
  if (have_posts()) :
    echo '<div class="doctor-grid">'; // Wrap for styling

    while (have_posts()) : the_post();

      // Get ACF fields
      $department = get_field('doctor_department');
      $specialty  = get_field('doctor_specialty');
      $experience = get_field('doctor_experience');
      $photo      = get_the_post_thumbnail_url(get_the_ID(), 'medium');
  ?>

      <div class="doctor-card">
        <?php if ($photo) : ?>
          <img src="<?php echo esc_url($photo); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>

        <h2><?php the_title(); ?></h2>

        <?php if ($specialty) : ?>
          <p><strong>Specialty:</strong> <?php echo esc_html($specialty); ?></p>
        <?php endif; ?>

        <?php if ($department) : ?>
          <p><strong>Department:</strong>
            <a href="<?php echo get_permalink($department->ID); ?>">
              <?php echo esc_html($department->post_title); ?>
            </a>
          </p>
        <?php endif; ?>

        <?php if ($experience) : ?>
          <p><strong>Experience:</strong> <?php echo esc_html($experience); ?> years</p>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="btn">View Profile</a>
      </div>

  <?php
    endwhile;

    echo '</div>'; // doctor-grid

    the_posts_pagination();

  else :
    echo '<p>No doctors found.</p>';
  endif;
  ?>

</div>

<?php get_footer(); ?>