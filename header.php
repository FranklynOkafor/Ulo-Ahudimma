<?php
// Header Template for Ahudimma

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="site-header">
    <div class="container">
      <div class="site-branding">
        <?php
        if (has_custom_logo()) {
          the_custom_logo();
        } else { ?>
          <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
            <?php bloginfo('name') ?>
          </a>
        <?php }
        ?>
      </div>
      <nav class="primary-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'ulo-ahudimma') ?>">
        <?php
        wp_nav_menu(
          [
            'theme_location' => 'primary',
            'menu_class' => 'pimary-menu',
            'container' => false,
            'fallback_cb' => false
          ]
        )
        ?>
      </nav>
      <button class="ulo-search-toggle" aria-label="Open Search"><span class="dashicons dashicons-search"></span></button>
      <a href="<?php echo site_url('/book-appointment') ?>" class="appointment-btn">Book an Appointment</a>
      <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
      </button>

    </div>
  </header>
  <div class="ulo-search-modal">
    <div class="ulo-search-overlay">

    </div>
    <div class="ulo-search-box">
      <button class="ulo-search-close">&times</button>
    </div>
    <form class="ulo-search-form">
      <input type="text" class="ulo-search-input" placeholder="Search Doctors..." autocomplete="off">
      <div class="ulo-search-results"></div>
    </form>
  </div>