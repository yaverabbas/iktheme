<?php
// Create a Custom REST API Endpoint for Projects
function ikonic_task_register_api_routes() {
    register_rest_route( 'ikonic-task/v1', '/projects', array(
        'methods' => 'GET',
        'callback' => 'ikonic_task_get_projects',
    ));
}

function ikonic_task_get_projects() {
    // Fetch all project posts
    $projects = get_posts( array(
        'post_type' => 'project',
        'numberposts' => -1,
    ));

    // Return error if no projects found
    if ( empty( $projects ) ) {
        return new WP_Error( 'no_projects', 'No projects found', array( 'status' => 404 ) );
    }

    $response = array();
    foreach ( $projects as $project ) {
        $response[] = array(
            'title'      => $project->post_title,
            'url'        => get_permalink( $project->ID ),
            'start_date' => get_post_meta( $project->ID, '_project_start_date', true ), // Make sure to use underscore for meta keys
            'end_date'   => get_post_meta( $project->ID, '_project_end_date', true ),
        );
    }

    return rest_ensure_response( $response );  // Ensure the response is in the correct format
}

add_action( 'rest_api_init', 'ikonic_task_register_api_routes' );
