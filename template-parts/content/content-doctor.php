<?php


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