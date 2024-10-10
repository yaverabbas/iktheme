<?php get_header(); ?>

<div class="container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1><?php the_title(); ?></h1>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <div class="post-content">
                    <?php the_content(); ?>
                </div>
                <div class="post-meta">
                    <p>Published on: <?php the_date(); ?> by <?php the_author(); ?></p>
                    <p><?php comments_popup_link(); ?></p>
                </div>
            </article>
        <?php endwhile;
    else :
        echo '<p>No content found.</p>';
    endif; ?>
</div>

<?php get_footer(); ?>
