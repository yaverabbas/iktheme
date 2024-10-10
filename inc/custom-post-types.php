<?php


function ikonic_task_register_post_types(): void
{
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'ikonic-task' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ikonic-task' ),
        'menu_name'             => __( 'Projects', 'ikonic-task' ),
        'all_items'             => __( 'All Projects', 'ikonic-task' ),
        'add_new_item'          => __( 'Add New Project', 'ikonic-task' ),
        'edit_item'             => __( 'Edit Project', 'ikonic-task' ),
    );

    $args = array(
        'label'                 => __( 'Project', 'ikonic-task' ),
        'description'           => __( 'Project Custom Post Type', 'ikonic-task' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'public'                => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_rest'          => true,
        'publicly_queryable'    => true,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'projects' ),
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'ikonic_task_register_post_types' );


// Add custom meta boxes to "Projects" post type
function ikonic_task_add_project_meta_boxes(): void
{
    add_meta_box(
        'project_details_meta_box',
        __( 'Project Details', 'ikonic-task' ),
        'ikonic_task_project_details_callback',
        'project',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'ikonic_task_add_project_meta_boxes' );

// Callback function to display the custom fields
function ikonic_task_project_details_callback( $post ): void
{
    // Retrieve current values if available
    $start_date = get_post_meta( $post->ID, '_project_start_date', true );
    $end_date = get_post_meta( $post->ID, '_project_end_date', true );
    $project_url = get_post_meta( $post->ID, '_project_url', true );

    // Display the form fields
    ?>
    <p>
        <label for="project_start_date"><?php _e( 'Project Start Date:', 'ikonic-task' ); ?></label>
        <input type="date" id="project_start_date" name="project_start_date" value="<?php echo esc_attr( $start_date ); ?>" />
    </p>
    <p>
        <label for="project_end_date"><?php _e( 'Project End Date:', 'ikonic-task' ); ?></label>
        <input type="date" id="project_end_date" name="project_end_date" value="<?php echo esc_attr( $end_date ); ?>" />
    </p>
    <p>
        <label for="project_url"><?php _e( 'Project URL:', 'ikonic-task' ); ?></label>
        <input type="url" id="project_url" name="project_url" value="<?php echo esc_attr( $project_url ); ?>" />
    </p>
    <?php
}

// Save the custom field data
function ikonic_task_save_project_meta( $post_id ): void
{
    // Verify nonce and check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['project_start_date'] ) || ! isset( $_POST['project_end_date'] ) || ! isset( $_POST['project_url'] ) ) return;

    // Save Project Start Date
    if ( isset( $_POST['project_start_date'] ) ) {
        update_post_meta( $post_id, '_project_start_date', sanitize_text_field( $_POST['project_start_date'] ) );
    }

    // Save Project End Date
    if ( isset( $_POST['project_end_date'] ) ) {
        update_post_meta( $post_id, '_project_end_date', sanitize_text_field( $_POST['project_end_date'] ) );
    }

    // Save Project URL
    if ( isset( $_POST['project_url'] ) ) {
        update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
    }
}
add_action( 'save_post', 'ikonic_task_save_project_meta' );
