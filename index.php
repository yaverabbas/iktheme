<?php get_header(); ?>

<div class="container">
    <h1><?php _e('Blog', 'ikonic-task'); ?></h1>

    <?php if ( have_posts() ) : ?>
        <div class="posts-grid">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="post-card">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-card-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <div class="post-card-content">
                        <h2 class="post-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="post-card-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="post-card-read-more"><?php _e('Read More', 'ikonic-task'); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            the_posts_pagination( array(
                'mid_size'  => 2,
                'prev_text' => __( 'Previous', 'ikonic-task' ),
                'next_text' => __( 'Next', 'ikonic-task' ),
            ) );
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found.', 'ikonic-task'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
