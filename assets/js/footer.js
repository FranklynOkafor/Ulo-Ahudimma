/**
 * Footer JavaScript - Back to Top Button
 * Ahudimma Healthcare Theme
 */

(function() {
  'use strict';
  
  // ========================================
  // BACK TO TOP BUTTON
  // ========================================
  
  function initBackToTop() {
      const backToTopBtn = document.getElementById('back-to-top');
      
      if (!backToTopBtn) return;
      
      // Show/hide button based on scroll position
      function toggleBackToTop() {
          const scrollThreshold = 300; // Show button after scrolling 300px
          
          if (window.pageYOffset > scrollThreshold) {
              backToTopBtn.classList.add('visible');
          } else {
              backToTopBtn.classList.remove('visible');
          }
      }
      
      // Scroll to top when button is clicked
      backToTopBtn.addEventListener('click', function(e) {
          e.preventDefault();
          
          window.scrollTo({
              top: 0,
              behavior: 'smooth'
          });
          
          // Focus on skip link or main content for accessibility
          const skipLink = document.querySelector('.skip-link');
          const mainContent = document.querySelector('main');
          
          if (skipLink) {
              skipLink.focus();
          } else if (mainContent) {
              mainContent.setAttribute('tabindex', '-1');
              mainContent.focus();
          }
      });
      
      // Listen to scroll events
      let scrollTimeout;
      window.addEventListener('scroll', function() {
          // Debounce for better performance
          if (scrollTimeout) {
              window.cancelAnimationFrame(scrollTimeout);
          }
          
          scrollTimeout = window.requestAnimationFrame(function() {
              toggleBackToTop();
          });
      });
      
      // Initial check
      toggleBackToTop();
  }
  
  // ========================================
  // FOOTER CURRENT YEAR (Optional)
  // ========================================
  
  function updateFooterYear() {
      // If you're using PHP date(), this is not needed
      // But can be used for dynamically updating year client-side
      const yearElements = document.querySelectorAll('.footer-year');
      const currentYear = new Date().getFullYear();
      
      yearElements.forEach(function(element) {
          element.textContent = currentYear;
      });
  }
  
  // ========================================
  // FOOTER WIDGET ANIMATIONS (Optional)
  // ========================================
  
  function initFooterAnimations() {
      // Only run if Intersection Observer is supported
      if (!('IntersectionObserver' in window)) return;
      
      const footerWidgets = document.querySelectorAll('.footer-widget');
      
      const observerOptions = {
          threshold: 0.1,
          rootMargin: '0px 0px -50px 0px'
      };
      
      const observer = new IntersectionObserver(function(entries) {
          entries.forEach(function(entry) {
              if (entry.isIntersecting) {
                  entry.target.classList.add('animated');
                  observer.unobserve(entry.target);
              }
          });
      }, observerOptions);
      
      footerWidgets.forEach(function(widget) {
          observer.observe(widget);
      });
  }
  
  // ========================================
  // SMOOTH SCROLL FOR FOOTER LINKS (Optional)
  // ========================================
  
  function initFooterSmoothScroll() {
      const footerLinks = document.querySelectorAll('.footer-menu a[href^="#"]');
      
      footerLinks.forEach(function(link) {
          link.addEventListener('click', function(e) {
              const href = this.getAttribute('href');
              
              // Skip if it's just "#" or empty
              if (href === '#' || href === '') return;
              
              const target = document.querySelector(href);
              
              if (target) {
                  e.preventDefault();
                  
                  // Get header height for offset
                  const header = document.querySelector('.site-header');
                  const headerHeight = header ? header.offsetHeight : 0;
                  
                  // Scroll to target
                  const targetPosition = target.offsetTop - headerHeight - 20;
                  
                  window.scrollTo({
                      top: targetPosition,
                      behavior: 'smooth'
                  });
                  
                  // Focus on target for accessibility
                  target.setAttribute('tabindex', '-1');
                  target.focus();
              }
          });
      });
  }
  
  // ========================================
  // SOCIAL LINK ICONS (Optional Enhancement)
  // ========================================
  
  function enhanceSocialLinks() {
      // Add Font Awesome or SVG icons to social links
      const socialLinks = document.querySelectorAll('.social-menu a');
      
      socialLinks.forEach(function(link) {
          const url = link.href.toLowerCase();
          let iconHTML = '';
          
          // Simple icon mapping (you can replace with Font Awesome or custom SVGs)
          if (url.includes('facebook.com')) {
              iconHTML = '<span aria-hidden="true">f</span>';
          } else if (url.includes('twitter.com') || url.includes('x.com')) {
              iconHTML = '<span aria-hidden="true">𝕏</span>';
          } else if (url.includes('instagram.com')) {
              iconHTML = '<span aria-hidden="true">📷</span>';
          } else if (url.includes('linkedin.com')) {
              iconHTML = '<span aria-hidden="true">in</span>';
          } else if (url.includes('youtube.com')) {
              iconHTML = '<span aria-hidden="true">▶</span>';
          }
          
          if (iconHTML) {
              // Keep screen reader text, add visual icon
              const screenReaderText = link.querySelector('.screen-reader-text');
              if (screenReaderText) {
                  link.insertAdjacentHTML('afterbegin', iconHTML);
              }
          }
      });
  }
  
  // ========================================
  // EXTERNAL LINK INDICATOR (Optional)
  // ========================================
  
  function markExternalLinks() {
      const footerLinks = document.querySelectorAll('.footer-widget a, .footer-menu a');
      const currentDomain = window.location.hostname;
      
      footerLinks.forEach(function(link) {
          // Check if link is external
          if (link.hostname && link.hostname !== currentDomain) {
              // Add visual indicator
              link.setAttribute('target', '_blank');
              link.setAttribute('rel', 'noopener noreferrer');
              
              // Add icon or text (optional)
              if (!link.querySelector('.external-icon')) {
                  const icon = document.createElement('span');
                  icon.className = 'external-icon';
                  icon.setAttribute('aria-hidden', 'true');
                  icon.innerHTML = ' ↗';
                  link.appendChild(icon);
              }
              
              // Update screen reader text
              const srText = link.querySelector('.screen-reader-text');
              if (srText) {
                  srText.textContent += ' (opens in new tab)';
              }
          }
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
      initBackToTop();
      updateFooterYear();
      // initFooterAnimations(); // Uncomment if you want fade-in animations
      // initFooterSmoothScroll(); // Uncomment if you have anchor links
      // enhanceSocialLinks(); // Uncomment if you want enhanced social icons
      // markExternalLinks(); // Uncomment if you want external link indicators
  }
  
})();

/* ========================================
 Optional CSS for Footer Animations
 Add this to your CSS if you enable animations
 ======================================== */
/*
.footer-widget {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.6s ease, transform 0.6s ease;
}

.footer-widget.animated {
  opacity: 1;
  transform: translateY(0);
}

.footer-widget:nth-child(1).animated {
  transition-delay: 0.1s;
}

.footer-widget:nth-child(2).animated {
  transition-delay: 0.2s;
}

.footer-widget:nth-child(3).animated {
  transition-delay: 0.3s;
}

.footer-widget:nth-child(4).animated {
  transition-delay: 0.4s;
}
*/