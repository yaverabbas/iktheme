<?php
get_template_part( 'template-parts/header' ); // Load the header
?>

    <div class="container">

        <div class="project-filters">
            <form method="GET" action="">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" value="<?php echo isset( $_GET['start_date'] ) ? esc_attr( $_GET['start_date'] ) : ''; ?>" />

                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" id="end_date" value="<?php echo isset( $_GET['end_date'] ) ? esc_attr( $_GET['end_date'] ) : ''; ?>" />

                <input type="submit" value="Filter" />
            </form>
        </div>

        <h1><?php post_type_archive_title(); ?></h1>

        <?php
        // Capture the filter values
        $start_date = isset( $_GET['start_date'] ) ? sanitize_text_field( $_GET['start_date'] ) : '';
        $end_date   = isset( $_GET['end_date'] ) ? sanitize_text_field( $_GET['end_date'] ) : '';

        // Set up custom query arguments
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => -1,
        );

        if ( $start_date && $end_date ) {
            $args['meta_query'] = array(
                'relation' => 'AND',
                array(
                    'key'     => 'project_start_date',
                    'value'   => $start_date,
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
                array(
                    'key'     => 'project_end_date',
                    'value'   => $end_date,
                    'compare' => '<=',
                    'type'    => 'DATE',
                ),
            );
        }

        // Custom query to fetch filtered projects
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                get_template_part( 'template-parts/content/content', 'archive-project' );
            endwhile;
        else :
            echo '<p>No projects found.</p>';
        endif;

        // Reset post data
        wp_reset_postdata();

        if ( have_posts() ) : ?>
            <div class="projects-list">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/content/content', 'archive-project' ); ?>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p><?php _e( 'No projects found.', 'ikonic-task' ); ?></p>
        <?php endif; ?>
    </div>

<?php
get_template_part( 'template-parts/footer' ); // Load the footer
