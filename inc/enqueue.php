<?php

// Enqueue styles and scripts for Ụlọ Ahụ̣dịmma


function ulo_ahudimma_enqueue_assets()
{

	$theme_version = wp_get_theme()->get('Version');

	// Dashicons styling
	wp_enqueue_style('dashicons');


	// Main stylesheet (compiled from SCSS)
	wp_enqueue_style(
		'ulo-ahudimma-main',
		get_template_directory_uri() . '/assets/css/main.css',
		[],
		$theme_version
	);






	// Main JavaScript file
	wp_enqueue_script(
		'ulo-ahudimma-main',
		get_template_directory_uri() . '/assets/js/main.js',
		[],
		$theme_version,
		true // Load in footer
	);

	// Mobile menu
	wp_enqueue_script(
		'ahudimma-mobile-menu',
		get_template_directory_uri() . '/assets/js/mobile-menu.js',
		array(),
		'1.0.0',
		true // Load in footer
	);

	// Footer Script
	wp_enqueue_script(
		'ahudimma-footer-scripts',
		get_template_directory_uri() . '/assets/js/footer-scripts.js',
		array(),
		filemtime(get_template_directory() . '/assets/js/footer.js'),
		true
	);


	// Search Script
	wp_enqueue_script(
		'ahudimma-search-scripts',
		get_template_directory_uri() . '/assets/js/search.js',
		array(),
		filemtime(get_template_directory() . '/assets/js/search.js'),
		true
	);

	// Filter Scripts
	wp_enqueue_script(
		'ahudimma-filter-scripts',
		get_template_directory_uri() . '/assets/js/filter-doctor.js',
		array(),
		filemtime(get_template_directory() . '/assets/js/filter-doctor.js'),
		true
	);
	wp_localize_script('ahudimma-filter-scripts', 'ahudimmaAjax', [
		'ajax_url' => admin_url('admin-ajax.php')
	]);



	
	// Appointment Script
	wp_enqueue_script(
		'ahudimma-appointment-scripts',
		get_template_directory_uri() . '/assets/js/appointment.js',
		['jquery'],
		filemtime(get_template_directory() . '/assets/js/appointment.js'),
		true
	);
	wp_localize_script('ahudimma-appointment-scripts', 'ahudimmaAjax', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce'    => wp_create_nonce('load_doctors_nonce')
	]);


	// Cintact Script
	wp_enqueue_script(
		'ahudimma-contact-scripts',
		get_template_directory_uri() . '/assets/js/contact.js',
		['jquery'],
		filemtime(get_template_directory() . '/assets/js/contact.js'),
		true
	);
}
add_action('wp_enqueue_scripts', 'ulo_ahudimma_enqueue_assets');
