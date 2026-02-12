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


  <div class="search-modal-overlay" id="searchModal">
    <div class="search-modal">
      <!-- Modal Header with Search Input -->
      <div class="search-modal-header">
        <span class="dashicons dashicons-search search-icon"></span>
        <div class="search-input-wrapper">
          <input
            type="text"
            class="search-input"
            id="searchInput"
            placeholder="Search Doctors..."
            autocomplete="off">
          <button class="clear-search" id="clearSearch" aria-label="Clear search">
            <span class="dashicons dashicons-no-alt"></span>
          </button>
        </div>
        <button class="close-modal" id="closeModal" aria-label="Close search">
          <span class="dashicons dashicons-no-alt"></span>
        </button>
      </div>

      <!-- Search Results -->
      <div class="search-results" id="searchResults">
        <!-- Empty State (shown by default) -->
        <div class="empty-state" id="emptyState">
          <span class="dashicons dashicons-search"></span>
          <h3>Start searching</h3>
          <p>Type to search for Doctors</p>
        </div>

        <!-- Loading State (shown while searching) -->
        <div class="loading-state" id="loadingState" style="display: none;">
          <div class="loading-spinner"></div>
          <p>Searching...</p>
        </div>

        <!-- Results Container -->
        <div id="resultsContainer" style="display: none;"></div>

        <!-- No Results State -->
        <div class="no-results" id="noResults" style="display: none;">
          <span class="dashicons dashicons-warning"></span>
          <h3>No results found</h3>
          <p>Try adjusting your search terms</p>
        </div>
      </div>
    </div>
  </div>