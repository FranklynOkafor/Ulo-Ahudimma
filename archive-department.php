<?php
get_header();
?>

<main class="department-archive">

  <section class="page-header">
    <div class="container">
      <h1>Our Departments</h1>
      <p>Explore our specialized medical departments committed to quality healthcare.</p>
    </div>
  </section>

  <section class="department-list">
    <div class="container">

      <?php if (have_posts()) : ?>
        <div class="department-grid">

          <?php while (have_posts()) : the_post(); ?>

            <article class="department-card">

              <a href="<?php the_permalink(); ?>" class="department-image">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('medium');
                } 
                
                ?>
              </a>

              <div class="department-content">
                <h2>
                  <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                  </a>
                </h2>

                <p class="department-excerpt">
                  <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                </p>

                <a href="<?php the_permalink(); ?>" class="btn">
                  View Department
                </a>
              </div>

            </article>

          <?php endwhile; ?>

        </div>

        <div class="pagination">
          <?php the_posts_pagination(); ?>
        </div>

      <?php else : ?>
        <p>No departments found.</p>
      <?php endif; ?>

    </div>
  </section>

</main>

<?php
get_footer();
