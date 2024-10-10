<?php

function get_filtered_projects() {

    $start_date = isset($_GET['start_date']) ? sanitize_text_field($_GET['start_date']) : '';
    $end_date = isset($_GET['end_date']) ? sanitize_text_field($_GET['end_date']) : '';

    $args = array(
        'post_type' => 'project',
        'posts_per_page' => -1,
    );

    if ($start_date || $end_date) {
        $meta_query = array('relation' => 'AND');

        if ($start_date) {
            $meta_query[] = array(
                'key' => '_project_end_date',
                'value' => $start_date,
                'compare' => '>=',
                'type' => 'DATE',
            );
        }

        if ($end_date) {
            $meta_query[] = array(
                'key' => '_project_start_date',
                'value' => $end_date,
                'compare' => '<=',
                'type' => 'DATE',
            );
        }

        $args['meta_query'] = $meta_query;
    }

    $projects_query = new WP_Query($args);

    // Prepare the response
    $projects = [];

    if ($projects_query->have_posts()) {
        while ($projects_query->have_posts()) : $projects_query->the_post();
            $projects[] = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'excerpt' => get_the_excerpt(),
                'start_date' => get_post_meta(get_the_ID(), '_project_start_date', true),
                'end_date' => get_post_meta(get_the_ID(), '_project_end_date', true),
            );
        endwhile;

        wp_send_json_success($projects);
    } else {
        wp_send_json_error('No projects found.');
    }

    wp_die();
}

add_action('wp_ajax_get_filtered_projects', 'get_filtered_projects');
add_action('wp_ajax_nopriv_get_filtered_projects', 'get_filtered_projects');
