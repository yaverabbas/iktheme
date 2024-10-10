<?php
// Register Custom Post Type: Projects
function ikonic_task_register_post_types(): void
{
    $labels = array(
        'name'                  => _x( 'Projects', 'Post Type General Name', 'ikonic-task' ),
        'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'ikonic-task' ),
        'menu_name'             => __( 'Projects', 'ikonic-task' ),
        'name_admin_bar'        => __( 'Project', 'ikonic-task' ),
        'archives'              => __( 'Project Archives', 'ikonic-task' ),
        'attributes'            => __( 'Project Attributes', 'ikonic-task' ),
        'all_items'             => __( 'All Projects', 'ikonic-task' ),
        'add_new_item'          => __( 'Add New Project', 'ikonic-task' ),
        'add_new'               => __( 'Add New', 'ikonic-task' ),
        'new_item'              => __( 'New Project', 'ikonic-task' ),
        'edit_item'             => __( 'Edit Project', 'ikonic-task' ),
        'update_item'           => __( 'Update Project', 'ikonic-task' ),
        'view_item'             => __( 'View Project', 'ikonic-task' ),
    );

    $args = array(
        'label'                 => __( 'Project', 'ikonic-task' ),
        'description'           => __( 'Project Custom Post Type', 'ikonic-task' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_rest'          => true,
        'show_in_nav_menus'     => true,
        'has_archive'           => true,
        'rewrite'               => array( 'slug' => 'projects' ),
    );
    register_post_type( 'project', $args );
}
add_action( 'init', 'ikonic_task_register_post_types' );
