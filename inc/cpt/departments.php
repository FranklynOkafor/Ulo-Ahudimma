<?php
function register_departments_cpt()
{

  $labels = array(
    'name'               => __('Departments', 'ulo-ahudimma'),
    'singular_name'      => __('Department', 'ulo-ahudimma'),
    'menu_name'          => __('Departments', 'ulo-ahudimma'),
    'name_admin_bar'     => __('Department', 'ulo-ahudimma'),
    'add_new'            => __('Add New', 'ulo-ahudimma'),
    'add_new_item'       => __('Add New Department', 'ulo-ahudimma'),
    'new_item'           => __('New Department', 'ulo-ahudimma'),
    'edit_item'          => __('Edit Department', 'ulo-ahudimma'),
    'view_item'          => __('View Department', 'ulo-ahudimma'),
    'all_items'          => __('All Departments', 'ulo-ahudimma'),
    'search_items'       => __('Search Departments', 'ulo-ahudimma'),
    'not_found'          => __('No departments found.', 'ulo-ahudimma'),
    'not_found_in_trash' => __('No departments found in Trash.', 'ulo-ahudimma'),
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'departments'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 6,
    'menu_icon'          => 'dashicons-building',
    'supports'           => array(
      'title',
      'editor',
      'thumbnail',
      'excerpt'
    ),
    'show_in_rest'       => true, // very important (Gutenberg + future-proofing)
  );

  register_post_type('department', $args);
}
add_action('init', 'register_departments_cpt');
