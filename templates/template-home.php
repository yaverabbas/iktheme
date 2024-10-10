<?php get_header(); ?>

<div class="container">
    <h1>Welcome to the Home Page</h1>

    <div class="latest-projects">
        <h2>Latest Projects</h2>
        <div class="projects-archive-container">
            <?php
            // Query to fetch the latest projects (CPT: project)
            $args = array(
                'post_type' => 'project',
                'posts_per_page' => 6,
            );
            $projects_query = new WP_Query($args);

            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) : $projects_query->the_post();

                    // Get custom fields for start and end date
                    $start_date = get_post_meta(get_the_ID(), '_project_start_date', true);
                    $end_date = get_post_meta(get_the_ID(), '_project_end_date', true);
                    ?>
                    <div class="project-archive-item">
                        <div class="project-archive-combo-dates">
                            <h2 class="project-archive-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <span>
                                <strong>Start Date:</strong> <?php echo esc_html($start_date); ?> |
                                <strong>End Date:</strong> <?php echo esc_html($end_date); ?>
                            </span>
                        </div>
                        <div class="project-archive-combo">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-archive-thumbnail">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="project-archive-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="project-archive-link">Read More</a>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No projects found.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
