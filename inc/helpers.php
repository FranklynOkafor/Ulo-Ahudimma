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
    'post_title' => 'Appointment — ' . sanitize_text_field($_POST['patient_name']),
    'post_status' => 'pending',
  ]);

  if ($appointment_id) {
    update_field('patient_name', sanitize_text_field($_POST['patient_name']), $appointment_id);
    update_field('patient_phone', sanitize_text_field($_POST['patient_phone']), $appointment_id);
    update_field('patient_email', sanitize_email($_POST['patient_email']), $appointment_id);
    update_field('appointment_department', intval($_POST['appointment_department']), $appointment_id);
    update_field('appointment_date', $_POST['appointment_date'], $appointment_id);
    update_field('appointment_time', $_POST['appointment_time'], $appointment_id);
    update_field('appointment_notes', sanitize_textarea_field($_POST['appointment_notes']), $appointment_id);
    update_field(
      'appointment_doctor',
      intval($_POST['appointment_doctor']),
      $appointment_id
    );
    $patient_email = sanitize_email($_POST['patient_email']);
    wp_mail(
      $patient_email, 
      'Appointment Request Recieved', 
      "Hello,
      Thank you for booking your appointment with us 
      Your request has been recieved and is currently pending conformation. We will notify you once it has been reviewed.
      
      Best Regards,
      Ulo Ahudimma.
      
      
      
      Dear WP SMTP... please Work ohh, I don't know if I have it in me for another iteration. Thank you."
    );
  }

  wp_redirect(home_url('/book-appointment'));
  exit;
}

add_action('admin_post_submit_appointment', 'ahudimma_handle_appointment_submission');
add_action('admin_post_nopriv_submit_appointment', 'ahudimma_handle_appointment_submission');


function ahudimma_send_conformation_email($new_status, $old_status, $post){
  if ($post -> post_type !== 'appointment') {
    return;
  }
  if ($old_status !== 'pending' || $new_status !== 'publish') {
    return;
  }

  $patient_email = get_field('patient_email', $post -> ID);
  $department_id = get_field('appointment_department', $post -> ID);
  $doctor_id = get_field('appointment_doctor', $post -> ID);
  $date = get_field('appointment_date', $post -> ID);
  $time = get_field('appointment_time', $post -> ID);
  
  $department = $department_id ? get_the_title($department_id) : 'N/A';
  $doctor = $doctor_id ? get_the_title($doctor_id) : 'To be assigned';

  wp_mail(
    $patient_email,
    'Appointment Confirmed',
    "Hello
    Your appointment has been confirmed.
    Department: {$department}
    Doctor: {$doctor}
    Date: {$date}
    Time: {$time}
    Please to avoid complications and so that we can do the registrations sharp sharp, arrive 15 mins early.
    Best Regards, 
    Me.
    "
  );
  
  
}

add_action('transition_post_status', 'ahudimma_send_conformation_email', 10, 3);


function ahudimma_load_doctors_by_department()
{

  check_ajax_referer('load_doctors_nonce', 'nonce');

  $department_id = intval($_POST['department_id']);

  $doctors = new WP_Query([
    'post_type'      => 'doctor', // confirm slug
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => [
      [
        'key'     => 'doctor_department',
        'value'   => $department_id,
        'compare' => 'LIKE'
      ]
    ]
  ]);

  $results = [];



  if ($doctors->have_posts()) {
    while ($doctors->have_posts()) {
      $doctors->the_post();
      $results[] = [
        'id'   => get_the_ID(),
        'name' => get_the_title()
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success($results);
}

add_action('wp_ajax_load_doctors_by_department', 'ahudimma_load_doctors_by_department');
add_action('wp_ajax_nopriv_load_doctors_by_department', 'ahudimma_load_doctors_by_department');












