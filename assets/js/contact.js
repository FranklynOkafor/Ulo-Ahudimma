/**
 * Contact Form JavaScript
 * Handles form validation and enhancements
 * Ahudimma Healthcare Theme
 */

(function() {
  'use strict';
  
  // ========================================
  // FORM VALIDATION
  // ========================================
  
  function initFormValidation() {
      const form = document.getElementById('contact-form');
      if (!form) return;
      
      form.addEventListener('submit', function(e) {
          let isValid = true;
          
          // Remove previous error styling
          const errorInputs = form.querySelectorAll('.error');
          errorInputs.forEach(input => input.classList.remove('error'));
          
          // Validate required fields
          const requiredFields = form.querySelectorAll('[required]');
          
          requiredFields.forEach(field => {
              if (!field.value.trim()) {
                  isValid = false;
                  field.classList.add('error');
                  field.focus();
              }
          });
          
          // Validate email format
          const emailField = form.querySelector('input[type="email"]');
          if (emailField && emailField.value) {
              const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
              if (!emailRegex.test(emailField.value)) {
                  isValid = false;
                  emailField.classList.add('error');
              }
          }
          
          // Validate phone (if provided)
          const phoneField = form.querySelector('input[type="tel"]');
          if (phoneField && phoneField.value) {
              const phoneRegex = /^[\d\s\-\+\(\)]+$/;
              if (!phoneRegex.test(phoneField.value) || phoneField.value.length < 10) {
                  isValid = false;
                  phoneField.classList.add('error');
              }
          }
          
          if (!isValid) {
              e.preventDefault();
              
              // Scroll to first error
              const firstError = form.querySelector('.error');
              if (firstError) {
                  firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
              }
          } else {
              // Add loading state
              form.classList.add('loading');
              const submitBtn = form.querySelector('.btn-submit');
              if (submitBtn) {
                  submitBtn.disabled = true;
              }
          }
      });
      
      // Real-time validation
      const inputs = form.querySelectorAll('input, select, textarea');
      inputs.forEach(input => {
          input.addEventListener('blur', function() {
              if (this.hasAttribute('required') && !this.value.trim()) {
                  this.classList.add('error');
              } else if (this.classList.contains('error') && this.value.trim()) {
                  this.classList.remove('error');
              }
          });
          
          input.addEventListener('input', function() {
              if (this.classList.contains('error') && this.value.trim()) {
                  this.classList.remove('error');
              }
          });
      });
  }
  
  // ========================================
  // ADD ERROR STYLING
  // ========================================
  
  // Add CSS for error state
  const style = document.createElement('style');
  style.textContent = `
      .contact-form input.error,
      .contact-form select.error,
      .contact-form textarea.error {
          border-color: var(--accent-red, #EF4444);
          background-color: rgba(239, 68, 68, 0.05);
      }
      
      .contact-form input.error:focus,
      .contact-form select.error:focus,
      .contact-form textarea.error:focus {
          box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
      }
  `;
  document.head.appendChild(style);
  
  // ========================================
  // CHARACTER COUNTER FOR TEXTAREA
  // ========================================
  
  function initCharacterCounter() {
      const textarea = document.getElementById('contact-message');
      if (!textarea) return;
      
      const maxLength = 1000;
      textarea.setAttribute('maxlength', maxLength);
      
      const counter = document.createElement('div');
      counter.className = 'character-counter';
      counter.style.cssText = 'font-size: 0.875rem; color: var(--text-light, #64748b); text-align: right; margin-top: 0.5rem;';
      
      textarea.parentElement.appendChild(counter);
      
      function updateCounter() {
          const remaining = maxLength - textarea.value.length;
          counter.textContent = `${remaining} characters remaining`;
          
          if (remaining < 100) {
              counter.style.color = 'var(--accent-red, #EF4444)';
          } else {
              counter.style.color = 'var(--text-light, #64748b)';
          }
      }
      
      updateCounter();
      textarea.addEventListener('input', updateCounter);
  }
  
  // ========================================
  // AUTO-HIDE SUCCESS/ERROR MESSAGES
  // ========================================
  
  function initMessageAutoHide() {
      const successMsg = document.querySelector('.success-message');
      const errorMsg = document.querySelector('.error-message');
      
      if (successMsg) {
          // Scroll to message
          successMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
          
          // Auto-hide after 8 seconds
          setTimeout(() => {
              successMsg.style.transition = 'opacity 0.5s ease';
              successMsg.style.opacity = '0';
              setTimeout(() => successMsg.remove(), 500);
          }, 8000);
      }
      
      if (errorMsg) {
          // Scroll to message
          errorMsg.scrollIntoView({ behavior: 'smooth', block: 'center' });
          
          // Auto-hide after 8 seconds
          setTimeout(() => {
              errorMsg.style.transition = 'opacity 0.5s ease';
              errorMsg.style.opacity = '0';
              setTimeout(() => errorMsg.remove(), 500);
          }, 8000);
      }
  }
  
  // ========================================
  // SMOOTH SCROLL TO FORM
  // ========================================
  
  function initFormScrollLinks() {
      // If there's a link to #contact-form
      const formLinks = document.querySelectorAll('a[href="#contact-form"]');
      
      formLinks.forEach(link => {
          link.addEventListener('click', function(e) {
              e.preventDefault();
              const form = document.getElementById('contact-form');
              if (form) {
                  form.scrollIntoView({ behavior: 'smooth', block: 'start' });
                  const firstInput = form.querySelector('input');
                  if (firstInput) {
                      setTimeout(() => firstInput.focus(), 500);
                  }
              }
          });
      });
  }
  
  // ========================================
  // PHONE NUMBER FORMATTING (Optional)
  // ========================================
  
  function initPhoneFormatting() {
      const phoneInput = document.getElementById('contact-phone');
      if (!phoneInput) return;
      
      phoneInput.addEventListener('input', function(e) {
          let value = e.target.value.replace(/\D/g, '');
          
          // Format as needed (example for US format)
          // Customize based on your country's format
          if (value.length > 0) {
              if (value.length <= 3) {
                  value = `(${value}`;
              } else if (value.length <= 6) {
                  value = `(${value.slice(0, 3)}) ${value.slice(3)}`;
              } else if (value.length <= 10) {
                  value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6)}`;
              } else {
                  value = `(${value.slice(0, 3)}) ${value.slice(3, 6)}-${value.slice(6, 10)}`;
              }
          }
          
          e.target.value = value;
      });
  }
  
  // ========================================
  // SPAM PROTECTION - HONEYPOT
  // ========================================
  
  function initHoneypot() {
      const form = document.getElementById('contact-form');
      if (!form) return;
      
      // Create hidden honeypot field
      const honeypot = document.createElement('input');
      honeypot.type = 'text';
      honeypot.name = 'website';
      honeypot.style.cssText = 'position: absolute; left: -9999px; width: 1px; height: 1px;';
      honeypot.tabIndex = -1;
      honeypot.autocomplete = 'off';
      
      form.appendChild(honeypot);
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
      initFormValidation();
      initCharacterCounter();
      initMessageAutoHide();
      initFormScrollLinks();
      initHoneypot();
      // initPhoneFormatting(); // Uncomment if you want phone formatting
  }
  
})();