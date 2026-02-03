<?php
function register_appointments_cpt()
{

  $labels = array(
    'name'               => __('Appointments', 'ulo-ahudimma'),
    'singular_name'      => __('Appointment', 'ulo-ahudimma'),
    'menu_name'          => __('Appointments', 'ulo-ahudimma'),
    'name_admin_bar'     => __('Appointment', 'ulo-ahudimma'),
    'add_new_item'       => __('Add Appointment', 'ulo-ahudimma'),
    'edit_item'          => __('Edit Appointment', 'ulo-ahudimma'),
    'view_item'          => __('View Appointment', 'ulo-ahudimma'),
    'all_items'          => __('All Appointments', 'ulo-ahudimma'),
    'search_items'       => __('Search Appointments', 'ulo-ahudimma'),
    'not_found'          => __('No appointments found.', 'ulo-ahudimma'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,        // not publicly visible
    'show_ui'            => true,         // visible in admin
    'show_in_menu'       => true,
    'menu_position'      => 7,
    'menu_icon'          => 'dashicons-calendar-alt',
    'capability_type'    => 'post',
    'supports'           => array('title'), // no editor needed
    'exclude_from_search' => true,
    'publicly_queryable' => false,
    'has_archive'        => false,
    'rewrite'            => false,
    'show_in_rest'       => true,
  );

  register_post_type('appointment', $args);
}
add_action('init', 'register_appointments_cpt');
