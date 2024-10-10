<article class="single-project">
    <h1><?php the_title(); ?></h1>

    <p><strong>Start Date:</strong> <?php echo get_post_meta( get_the_ID(), 'project_start_date', true ); ?></p>
    <p><strong>End Date:</strong> <?php echo get_post_meta( get_the_ID(), 'project_end_date', true ); ?></p>

    <div class="project-content">
        <?php the_content(); ?>
    </div>

    <p><a href="<?php echo esc_url( get_post_meta( get_the_ID(), 'project_url', true ) ); ?>" target="_blank">
            Visit Project</a></p>
</article>
