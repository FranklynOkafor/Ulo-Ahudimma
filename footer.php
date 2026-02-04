<?php

/**
 * Footer Template for Ụlọ Ahụ̣dịmma
 * Enhanced version with widgets and social links
 * 
 * @package Ahudimma
 */
?>

<footer class="site-footer">

  <!-- Footer Widgets Section (Optional) -->
  <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
    <div class="footer-widgets">
      <div class="container">
        <div class="footer-widget-area">

          <!-- Footer Widget 1 -->
          <?php if (is_active_sidebar('footer-1')) : ?>
            <div class="footer-widget footer-widget-1">
              <?php dynamic_sidebar('footer-1'); ?>
            </div>
          <?php endif; ?>

          <!-- Footer Widget 2 -->
          <?php if (is_active_sidebar('footer-2')) : ?>
            <div class="footer-widget footer-widget-2">
              <?php dynamic_sidebar('footer-2'); ?>
            </div>
          <?php endif; ?>

          <!-- Footer Widget 3 -->
          <?php if (is_active_sidebar('footer-3')) : ?>
            <div class="footer-widget footer-widget-3">
              <?php dynamic_sidebar('footer-3'); ?>
            </div>
          <?php endif; ?>

          <!-- Footer Widget 4 - Contact/Info (Optional) -->
          <div class="footer-widget footer-widget-4">
            <!-- Site Branding in Footer -->
            <?php if (has_custom_logo()) : ?>
              <div class="footer-logo">
                <?php the_custom_logo(); ?>
              </div>
            <?php else : ?>
              <h3 class="footer-site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php bloginfo('name'); ?>
                </a>
              </h3>
            <?php endif; ?>

            <!-- Site Description/Tagline -->
            <?php
            $description = get_bloginfo('description', 'display');
            if ($description || is_customize_preview()) :
            ?>
              <p class="footer-description">
                <?php echo esc_html($description); ?>
              </p>
            <?php endif; ?>

            <!-- Contact Information (you can customize this) -->
            <div class="footer-contact">
              <?php
              // You can use ACF or Customizer for these values
              $phone = get_theme_mod('contact_phone', '+234 903 4762 387');
              $email = get_theme_mod('contact_email', 'EdesCare@gmail.com');
              $address = get_theme_mod('contact_address', '12 sancah close Abuja,Nigeria');
              ?>

              <?php if ($address) : ?>
                <p class="footer-address">
                  <span class="icon">📍</span>
                  <span><?php echo esc_html($address); ?></span>
                </p>
              <?php endif; ?>

              <?php if ($phone) : ?>
                <p class="footer-phone">
                  <span class="icon">📞</span>
                  <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>">
                    <?php echo esc_html($phone); ?>
                  </a>
                </p>
              <?php endif; ?>

              <?php if ($email) : ?>
                <p class="footer-email">
                  <span class="icon">✉️</span>
                  <a href="mailto:<?php echo esc_attr($email); ?>">
                    <?php echo esc_html($email); ?>
                  </a>
                </p>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>
    </div>
  <?php endif; ?>

  <!-- Footer Bottom -->
  <div class="footer-bottom">
    <div class="container">

      <!-- Footer Navigation -->
      <?php if (has_nav_menu('footer')) : ?>
        <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', 'ulo-ahudimma'); ?>">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'footer',
              'menu_class'     => 'footer-menu',
              'container'      => false,
              'fallback_cb'    => false,
              'depth'          => 1,
            )
          );
          ?>
        </nav>
      <?php endif; ?>

      <!-- Social Links (Optional) -->
      <?php if (has_nav_menu('social')) : ?>
        <nav class="footer-social" aria-label="<?php esc_attr_e('Social Media Links', 'ulo-ahudimma'); ?>">
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'social',
              'menu_class'     => 'social-menu',
              'container'      => false,
              'fallback_cb'    => false,
              'depth'          => 1,
              'link_before'    => '<span class="screen-reader-text">',
              'link_after'     => '</span>',
            )
          );
          ?>
        </nav>
      <?php endif; ?>

      <!-- Copyright Info -->
      <div class="site-info">
        <p>
          &copy; <?php echo date('Y'); ?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
          </a>.
          <?php esc_html_e('All rights reserved.', 'ulo-ahudimma'); ?>
        </p>

        <!-- Optional: Credits -->
        <?php if (get_theme_mod('show_footer_credits', true)) : ?>
          <p class="footer-credits">
            <?php
            printf(
              /* translators: 1: Theme name, 2: Developer name */
              esc_html__('Website Designed By %s', 'ulo-ahudimma'),
              '<a href="#" target="_blank" rel="noopener">Franklyn Okafor</a>'
            );
            ?>
          </p>
        <?php endif; ?>
      </div>

    </div>
  </div>

  <!-- Back to Top Button (Optional) -->
  <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'ulo-ahudimma'); ?>">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M10 4L10 16M10 4L4 10M10 4L16 10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
  </button>

</footer>

<?php wp_footer(); ?>
</body>

</html>