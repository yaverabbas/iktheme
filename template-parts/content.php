<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="entry-meta">
            <span class="project-date"><?php echo get_the_date(); ?></span>
        </div>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); // Display excerpt or a summary of the project ?>
    </div>

    <footer class="entry-footer">
        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e( 'Read More', 'ikonic-task' ); ?></a>
    </footer>
</article>
