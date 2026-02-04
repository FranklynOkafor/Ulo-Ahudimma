<?php

/**
 * Theme setup for Ụlọ Ahụ̣dịmma
 */

if (! function_exists('ulo_ahudimma_theme_setup')) {
  function ulo_ahudimma_theme_setup()
  {

    // Make theme available for translation
    load_theme_textdomain(
      'ulo-ahudimma',
      get_template_directory() . '/languages'
    );

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable featured images
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo', array(
      'height'      => 80,
      'width'       => 200,
      'flex-height' => true,
      'flex-width'  => true,
    ));

    // Enable HTML5 markup support
    add_theme_support(
      'html5',
      [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      ]
    );

    // Enable custom logo support
    add_theme_support(
      'custom-logo',
      [
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
      ]
    );

    // Register navigation menus
    register_nav_menus(
      [
        'primary' => __('Primary Menu', 'ulo-ahudimma'),
        'footer'  => __('Footer Menu', 'ulo-ahudimma'),
      ]
    );

    // Set Content Width
    if (! isset($content_width)) {
      $content_width = 1200;
    }
  }
}
add_action('after_setup_theme', 'ulo_ahudimma_theme_setup');
