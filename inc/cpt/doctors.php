<?php
/**
 * Register Doctors Custom Post Type
 */

if ( ! function_exists( 'ulo_ahudimma_register_doctors_cpt' ) ) {

	function ulo_ahudimma_register_doctors_cpt() {

		$labels = [
			'name'                  => _x( 'Doctors', 'Post Type General Name', 'ulo-ahudimma' ),
			'singular_name'         => _x( 'Doctor', 'Post Type Singular Name', 'ulo-ahudimma' ),
			'menu_name'             => __( 'Doctors', 'ulo-ahudimma' ),
			'name_admin_bar'        => __( 'Doctor', 'ulo-ahudimma' ),
			'archives'              => __( 'Doctor Archives', 'ulo-ahudimma' ),
			'attributes'            => __( 'Doctor Attributes', 'ulo-ahudimma' ),
			'parent_item_colon'     => __( 'Parent Doctor:', 'ulo-ahudimma' ),
			'all_items'             => __( 'All Doctors', 'ulo-ahudimma' ),
			'add_new_item'          => __( 'Add New Doctor', 'ulo-ahudimma' ),
			'add_new'               => __( 'Add New', 'ulo-ahudimma' ),
			'new_item'              => __( 'New Doctor', 'ulo-ahudimma' ),
			'edit_item'             => __( 'Edit Doctor', 'ulo-ahudimma' ),
			'update_item'           => __( 'Update Doctor', 'ulo-ahudimma' ),
			'view_item'             => __( 'View Doctor', 'ulo-ahudimma' ),
			'view_items'            => __( 'View Doctors', 'ulo-ahudimma' ),
			'search_items'          => __( 'Search Doctor', 'ulo-ahudimma' ),
			'not_found'             => __( 'Not found', 'ulo-ahudimma' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ulo-ahudimma' ),
			'featured_image'        => __( 'Profile Image', 'ulo-ahudimma' ),
			'set_featured_image'    => __( 'Set profile image', 'ulo-ahudimma' ),
			'remove_featured_image' => __( 'Remove profile image', 'ulo-ahudimma' ),
			'use_featured_image'    => __( 'Use as profile image', 'ulo-ahudimma' ),
			'insert_into_item'      => __( 'Insert into doctor', 'ulo-ahudimma' ),
			'uploaded_to_this_item' => __( 'Uploaded to this doctor', 'ulo-ahudimma' ),
			'items_list'            => __( 'Doctors list', 'ulo-ahudimma' ),
			'items_list_navigation' => __( 'Doctors list navigation', 'ulo-ahudimma' ),
			'filter_items_list'     => __( 'Filter doctors list', 'ulo-ahudimma' ),
		];

		$args = [
			'label'               => __( 'Doctor', 'ulo-ahudimma' ),
			'description'         => __( 'Doctors and specialists', 'ulo-ahudimma' ),
			'labels'              => $labels,
			'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ],
			'taxonomies'          => [ 'department' ], // link to department taxonomy
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-businessperson',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => [ 'slug' => 'doctors' ],
			'show_in_rest'        => true, // for Gutenberg & REST API
		];

		register_post_type( 'doctor', $args );

	}

}
add_action( 'init', 'ulo_ahudimma_register_doctors_cpt', 0 );
