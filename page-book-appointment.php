<?php

/**
 * Appointment Page
 *
 * @package Ahudimma
 */

get_header();
?>

<main class="appointment-page">
  <div class="container">

    <header class="page-header">
      <h1>Book an Appointment</h1>
      <p>Please fill in the form below and our team will contact you shortly.</p>
    </header>

    <?php get_template_part('template-parts/sections/appointments', 'form'); ?>

  </div>
</main>

<?php get_footer(); ?>