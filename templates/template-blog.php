<?php get_header(); ?>

<div class="container">
    <h1>Blog</h1>
    <div class="blog-posts">
        <?php
        // Query to fetch the latest blog posts
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <div class="blog-post">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="excerpt"><?php the_excerpt(); ?></div>
                </div>
            <?php endwhile;
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
