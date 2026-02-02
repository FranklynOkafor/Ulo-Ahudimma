<?php
// Footer template for Ụlọ Ahụ̣dịmma

?>

<footer class="site-footer">
  <div class="container">

    <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'ulo-ahudimma'); ?>">
      <?php
      wp_nav_menu(
        [
          'theme_location' => 'footer',
          'menu_class'     => 'footer-menu',
          'container'      => false,
          'fallback_cb'    => false,
        ]
      );
      ?>
    </nav>

    <div class="site-info">
      <p>
        &copy; <?php echo date('Y'); ?>
        <?php bloginfo('name'); ?>.
        <?php esc_html_e('All rights reserved.', 'ulo-ahudimma'); ?>
      </p>
    </div>

  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>