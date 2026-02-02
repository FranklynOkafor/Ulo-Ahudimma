<?php
// Theme Setup
require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';

// Custom Post Type 
require_once get_template_directory() . '/inc/cpt/doctors.php';
require_once get_template_directory() . '/inc/cpt/departments.php';
require_once get_template_directory() . '/inc/cpt/appointments.php';

// Customizer
require_once get_template_directory() . '/inc/customizer/colors.php';
require_once get_template_directory() . '/inc/customizer/typography.php';
require_once get_template_directory() . '/inc/customizer/layout.php';
