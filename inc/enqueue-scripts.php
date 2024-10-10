<?php
// Enqueue Styles and Scripts
function ikonic_task_enqueue_assets() {
    // Load theme stylesheet
    wp_enqueue_style( 'ikonic-task-style', get_stylesheet_uri() );

    // Example to add custom JS (if needed later)
    wp_enqueue_script( 'ikonic-task-scripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );

    // Load main stylesheet
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main-style.css' );

    // Load responsive stylesheet
    wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), '1.0', 'all' );

    // Load project filters JS file
    wp_enqueue_script('filter-js', get_template_directory_uri() . '/assets/js/projectFilters.js', array('jquery'), '1.0', true);
    wp_localize_script('filter-js',
        'project_filters_ajax_object', array(
            'ajax_url' => admin_url('admin-ajax.php')
        )
    );

}
add_action( 'wp_enqueue_scripts', 'ikonic_task_enqueue_assets' );
