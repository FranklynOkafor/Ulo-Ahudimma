<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post() ;?>
    <div class="doctor-profile">
      <!-- Doctor Photo -->
       <div class="doctor-photo">
        <?php if (has_post_thumbnail()) {
          the_post_thumbnail( 'medium' );

          # code...
        } else{
          echo '<img src="' . get_template_directory_uri() . '/images/default-doctor.jpg" alt = "Doctor"> ';
        }
        ?>
       </div>
       
    </div>
  <?php endwhile; ?>
  <?php endif ;?>
<?php get_footer(); ?>