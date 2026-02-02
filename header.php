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
    </div>
  </header>
