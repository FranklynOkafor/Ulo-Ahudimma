<?php get_header(); ?>
<div class="doctor-archive">
  <h1>Our Doctors</h1>

  <?php if (have_posts()) {
    echo '<div class="doctor-grid"></div>';

    while (have_posts()) {
      the_post();
      $department = get_field('doctor_department');
      $specialty  = get_field('doctor_specialty');
      $experience = get_field('doctor_experience');
      $photo      = get_the_post_thumbnail_url(get_the_ID(), 'medium');
      # code...
    } ?>
    <div class="doctor-card">
      <?php if ($photo) : ?>
      <?php endif; ?>
    </div>
  <?php } ?>
</div>