<?php
/*
Template Name: Projects Archive
*/

get_header(); ?>

<div class="container">
    <h2>Projects</h2>
    <div class="projects-list">
        <?php
        // Create a new query for the 'project' post type
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1, // Show all projects
        );
        $projects_query = new WP_Query( $args );

        // Check if there are any projects
        if ( $projects_query->have_posts() ) :
            // Loop through the projects
            while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
                <div class="project-item">
                    <h3><?php the_title(); ?></h3>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="project-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                    <div class="project-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="project-link">Read More</a>
                </div>
            <?php endwhile;
        else : ?>
            <p><?php _e( 'No projects found.', 'ikonic-task' ); ?></p>
        <?php endif; ?>

        <?php
        // Reset post data
        wp_reset_postdata();
        ?>
    </div>
</div>

<?php get_footer(); ?>
