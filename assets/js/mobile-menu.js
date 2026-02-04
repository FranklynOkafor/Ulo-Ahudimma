/**
 * Mobile Menu Toggle and Header Scroll Effects
 * Ahudimma Healthcare Theme
 */

(function() {
  'use strict';
  
  // ========================================
  // MOBILE MENU TOGGLE
  // ========================================
  
  function initMobileMenu() {
      // Create mobile menu toggle button if it doesn't exist
      const header = document.querySelector('.site-header .container');
      const navigation = document.querySelector('.primary-navigation');
      
      if (!header || !navigation) return;
      
      // Check if toggle button already exists
      let toggleBtn = document.querySelector('.mobile-menu-toggle');
      
      if (!toggleBtn) {
          // Create toggle button
          toggleBtn = document.createElement('button');
          toggleBtn.className = 'mobile-menu-toggle';
          toggleBtn.setAttribute('aria-label', 'Toggle mobile menu');
          toggleBtn.setAttribute('aria-expanded', 'false');
          toggleBtn.innerHTML = '<span></span><span></span><span></span>';
          
          // Insert before navigation
          header.insertBefore(toggleBtn, navigation);
      }
      
      // Toggle menu on button click
      toggleBtn.addEventListener('click', function() {
          const isExpanded = this.getAttribute('aria-expanded') === 'true';
          
          this.classList.toggle('active');
          navigation.classList.toggle('active');
          document.body.classList.toggle('menu-open');
          
          this.setAttribute('aria-expanded', !isExpanded);
      });
      
      // Close menu when clicking outside
      document.addEventListener('click', function(e) {
          if (!navigation.contains(e.target) && !toggleBtn.contains(e.target)) {
              if (navigation.classList.contains('active')) {
                  toggleBtn.classList.remove('active');
                  navigation.classList.remove('active');
                  document.body.classList.remove('menu-open');
                  toggleBtn.setAttribute('aria-expanded', 'false');
              }
          }
      });
      
      // Close menu on escape key
      document.addEventListener('keydown', function(e) {
          if (e.key === 'Escape' && navigation.classList.contains('active')) {
              toggleBtn.classList.remove('active');
              navigation.classList.remove('active');
              document.body.classList.remove('menu-open');
              toggleBtn.setAttribute('aria-expanded', 'false');
              toggleBtn.focus();
          }
      });
      
      // Handle window resize
      let resizeTimer;
      window.addEventListener('resize', function() {
          clearTimeout(resizeTimer);
          resizeTimer = setTimeout(function() {
              if (window.innerWidth > 991) {
                  toggleBtn.classList.remove('active');
                  navigation.classList.remove('active');
                  document.body.classList.remove('menu-open');
                  toggleBtn.setAttribute('aria-expanded', 'false');
              }
          }, 250);
      });
  }
  
  // ========================================
  // HEADER SCROLL EFFECTS
  // ========================================
  
  function initHeaderScroll() {
      const header = document.querySelector('.site-header');
      if (!header) return;
      
      let lastScroll = 0;
      const scrollThreshold = 50;
      
      window.addEventListener('scroll', function() {
          const currentScroll = window.pageYOffset;
          
          if (currentScroll > scrollThreshold) {
              header.classList.add('scrolled');
          } else {
              header.classList.remove('scrolled');
          }
          
          lastScroll = currentScroll;
      });
  }
  
  // ========================================
  // SUBMENU ACCESSIBILITY
  // ========================================
  
  function initSubmenuAccessibility() {
      const menuItems = document.querySelectorAll('.pimary-menu > li');
      
      menuItems.forEach(function(item) {
          const link = item.querySelector('a');
          const submenu = item.querySelector('.sub-menu');
          
          if (submenu) {
              // Add aria attributes
              link.setAttribute('aria-haspopup', 'true');
              link.setAttribute('aria-expanded', 'false');
              
              // Toggle submenu on click for mobile
              link.addEventListener('click', function(e) {
                  if (window.innerWidth <= 991) {
                      e.preventDefault();
                      const isExpanded = this.getAttribute('aria-expanded') === 'true';
                      this.setAttribute('aria-expanded', !isExpanded);
                      item.classList.toggle('submenu-open');
                  }
              });
              
              // Keyboard navigation
              link.addEventListener('keydown', function(e) {
                  // Arrow down opens submenu
                  if (e.key === 'ArrowDown' && submenu) {
                      e.preventDefault();
                      this.setAttribute('aria-expanded', 'true');
                      const firstSubmenuLink = submenu.querySelector('a');
                      if (firstSubmenuLink) firstSubmenuLink.focus();
                  }
              });
              
              // Arrow up from first submenu item closes submenu
              const submenuLinks = submenu.querySelectorAll('a');
              if (submenuLinks.length > 0) {
                  submenuLinks[0].addEventListener('keydown', function(e) {
                      if (e.key === 'ArrowUp') {
                          e.preventDefault();
                          link.setAttribute('aria-expanded', 'false');
                          link.focus();
                      }
                  });
              }
          }
      });
  }
  
  // ========================================
  // SMOOTH SCROLL TO SECTIONS
  // ========================================
  
  function initSmoothScroll() {
      const links = document.querySelectorAll('a[href^="#"]');
      
      links.forEach(function(link) {
          link.addEventListener('click', function(e) {
              const href = this.getAttribute('href');
              
              // Skip if it's just "#" or empty
              if (href === '#' || href === '') return;
              
              const target = document.querySelector(href);
              
              if (target) {
                  e.preventDefault();
                  
                  // Close mobile menu if open
                  const navigation = document.querySelector('.primary-navigation');
                  const toggleBtn = document.querySelector('.mobile-menu-toggle');
                  if (navigation && navigation.classList.contains('active')) {
                      navigation.classList.remove('active');
                      toggleBtn.classList.remove('active');
                      document.body.classList.remove('menu-open');
                      toggleBtn.setAttribute('aria-expanded', 'false');
                  }
                  
                  // Get header height for offset
                  const header = document.querySelector('.site-header');
                  const headerHeight = header ? header.offsetHeight : 0;
                  
                  // Scroll to target
                  const targetPosition = target.offsetTop - headerHeight - 20;
                  
                  window.scrollTo({
                      top: targetPosition,
                      behavior: 'smooth'
                  });
              }
          });
      });
  }
  
  // ========================================
  // INITIALIZE ALL FUNCTIONS
  // ========================================
  
  // Wait for DOM to be ready
  if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
  } else {
      init();
  }
  
  function init() {
      initMobileMenu();
      initHeaderScroll();
      initSubmenuAccessibility();
      initSmoothScroll();
  }
  
})();