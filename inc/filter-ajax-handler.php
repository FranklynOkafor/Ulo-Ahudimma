<?php
function ulo_filter_doctors_ajax()
{
  $department = isset($_POST['department'])
    ? sanitize_text_field($_POST['department'])
    : '';

  $args = [
    'post_type' => 'doctor',
    'posts_per_page' => -1,
  ];
  

  if (!empty($department)) {
    $args['meta_query'] = [
      [
        'key' => 'doctor_department',
        'value' => $department,
        'compare' => '=',
      ]
    ];
  }

  $query = new WP_Query($args);
  

  if ($query->have_posts()):
    while ($query->have_posts()):
      $query->the_post();
      get_template_part('template-parts/content/content', 'doctor');

    endwhile;
  else:
    echo '<p>No Doctors found</p>';

  endif;

  wp_reset_postdata();
  wp_die();
}
add_action('wp_ajax_filter_doctors', 'ulo_filter_doctors_ajax');
add_action('wp_ajax_nopriv_filter_doctors', 'ulo_filter_doctors_ajax');
