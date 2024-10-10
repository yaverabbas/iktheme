<?php get_header(); ?>

<div class="container single-project">
    <?php while ( have_posts() ) : the_post(); ?>
        <h1><?php the_title(); ?></h1>

        <div class="project-meta">
            <?php
            $start_date = get_post_meta( get_the_ID(), '_project_start_date', true );
            $end_date = get_post_meta( get_the_ID(), '_project_end_date', true );
            $project_url = get_post_meta( get_the_ID(), '_project_url', true );
            ?>

            <?php if ( $start_date ) : ?>
                <p><strong>Start Date:</strong> <?php echo esc_html( $start_date ); ?></p>
            <?php endif; ?>

            <?php if ( $end_date ) : ?>
                <p><strong>End Date:</strong> <?php echo esc_html( $end_date ); ?></p>
            <?php endif; ?>

            <?php if ( $project_url ) : ?>
                <p><strong>Project URL:</strong> <a href="<?php echo esc_url( $project_url ); ?>" target="_blank"><?php echo esc_html( $project_url ); ?></a></p>
            <?php endif; ?>
        </div>

        <div class="project-archive-combo">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="project-thumbnail">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <div class="project-content">
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
