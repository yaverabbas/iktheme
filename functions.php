<?php

// Load required files from the /inc/ folder
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/rest-api.php';
require get_template_directory() . '/inc/project-filter-functions.php';

// Load custom archive and single templates from /templates/ for Projects post type
function ikonic_task_project_templates( $template )
{
    if ( is_post_type_archive( 'project' ) ) {
        $archive_template = get_template_directory() . '/templates/archive-project.php';
        if ( file_exists( $archive_template ) ) {
            return $archive_template;
        }
    }

    if ( is_singular( 'project' ) ) {
        $single_template = get_template_directory() . '/templates/single-project.php';
        if ( file_exists( $single_template ) ) {
            return $single_template;
        }
    }

    return $template;
}

add_filter( 'template_include', 'ikonic_task_project_templates' );

