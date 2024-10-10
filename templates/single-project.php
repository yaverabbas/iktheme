<?php
get_template_part( 'template-parts/header' ); // Load the header
?>

    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/content/content', 'single-project' ); ?>
        <?php endwhile; else : ?>
            <p><?php _e( 'No project found.', 'ikonic-task' ); ?></p>
        <?php endif; ?>
    </div>

<?php
get_template_part( 'template-parts/footer' ); // Load the footer
