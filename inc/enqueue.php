<?php

// Enqueue styles and scripts for Ụlọ Ahụ̣dịmma


function ulo_ahudimma_enqueue_assets()
{

	$theme_version = wp_get_theme()->get('Version');

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
}
add_action('wp_enqueue_scripts', 'ulo_ahudimma_enqueue_assets');
