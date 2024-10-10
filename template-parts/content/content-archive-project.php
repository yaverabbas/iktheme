<article class="project-item">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><strong>Start Date:</strong> <?php echo get_post_meta( get_the_ID(), 'project_start_date', true ); ?></p>
    <p><strong>End Date:</strong> <?php echo get_post_meta( get_the_ID(), 'project_end_date', true ); ?></p>
    <div class="project-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>
