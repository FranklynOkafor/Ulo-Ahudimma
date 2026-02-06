<?php
function ahudimma_handle_appointment_submission()
{

  if (
    ! isset($_POST['appointment_nonce']) ||
    ! wp_verify_nonce($_POST['appointment_nonce'], 'submit_appointment_nonce')
  ) {
    wp_die('Security check failed');
  }

  $appointment_id = wp_insert_post([
    'post_type'   => 'appointment',
    'post_title'  => sanitize_text_field($_POST['patient_name']),
    'post_status' => 'publish',
  ]);

  if ($appointment_id) {
    update_field('patient_name', sanitize_text_field($_POST['patient_name']), $appointment_id);
    update_field('patient_phone', sanitize_text_field($_POST['patient_phone']), $appointment_id);
    update_field('patient_email', sanitize_email($_POST['patient_email']), $appointment_id);
    update_field('appointment_department', intval($_POST['appointment_department']), $appointment_id);
    update_field('appointment_date', $_POST['appointment_date'], $appointment_id);
    update_field('appointment_time', $_POST['appointment_time'], $appointment_id);
    update_field('appointment_notes', sanitize_textarea_field($_POST['appointment_notes']), $appointment_id);
  }

  wp_redirect(home_url('/appointment/?success=1'));
  exit;
}

add_action('admin_post_submit_appointment', 'ahudimma_handle_appointment_submission');
add_action('admin_post_nopriv_submit_appointment', 'ahudimma_handle_appointment_submission');
