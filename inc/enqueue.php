<?php

// Enqueue styles and scripts for Ụlọ Ahụ̣dịmma
 

function ulo_ahudimma_enqueue_assets() {

	$theme_version = wp_get_theme()->get( 'Version' );

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
}
add_action( 'wp_enqueue_scripts', 'ulo_ahudimma_enqueue_assets' );
