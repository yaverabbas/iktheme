<?php
// Theme Setup
function ikonic_task_theme_setup(): void
{
    // Add support for dynamic title tags
    add_theme_support( 'title-tag' );

    // Add support for post thumbnails
    add_theme_support( 'post-thumbnails' );

    // Register a primary menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'ikonic-task' ),
        'footer-menu'  => __( 'Footer Menu', 'ikonic-task' )
    ) );

    // Load theme's textdomain for translations
    load_theme_textdomain( 'ikonic-task', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'ikonic_task_theme_setup' );
