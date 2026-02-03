<?php get_header(); ?>

<div class="doctor-archive">
    <h1>Our Doctors</h1>

    <?php if ( have_posts() ) : ?>
        <div class="doctor-grid">

            <?php while ( have_posts() ) : the_post(); 

                // Get ACF fields
                $department = get_field( 'doctor_department' );
                $specialty  = get_field( 'doctor_specialty' );
                $experience = get_field( 'doctor_experience' );

                // Featured image
                $photo = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

            ?>

            <div class="doctor-card">
                <?php if ( $photo ) : ?>
                    <img src="<?php echo esc_url( $photo ); ?>" alt="<?php the_title(); ?>" class="doctor-photo">
                <?php else : ?>
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/default-doctor.jpg' ); ?>" alt="Default doctor" class="doctor-photo">
                <?php endif; ?>

                <h2><?php the_title(); ?></h2>

                <?php if ( $specialty ) : ?>
                    <p class="doctor-specialty"><?php echo esc_html( $specialty ); ?></p>
                <?php endif; ?>

                <?php if ( $department ) : ?>
                    <p class="doctor-department">
                        <a href="<?php echo get_permalink( $department->ID ); ?>">
                            <?php echo esc_html( $department->post_title ); ?>
                        </a>
                    </p>
                <?php endif; ?>

                <a href="<?php the_permalink(); ?>" class="btn">View Profile</a>
            </div>

            <?php endwhile; ?>

        </div> <!-- .doctor-grid -->

        <?php the_posts_pagination(); ?>

    <?php else : ?>
        <p>No doctors found.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
