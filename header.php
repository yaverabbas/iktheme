<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?> </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri() . '/favicon.ico'); ?>" sizes="16x16" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

        <nav class="site-navigation">
            <!-- Hamburger icon for mobile view -->
            <button class="menu-toggle" aria-label="Toggle menu">&#9776;</button>

            <!-- Primary menu -->
            <ul class="primary-menu">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'menu-list',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'fallback_cb'    => false,
                    'walker'         => new Walker_Nav_Menu(), // Walker for handling multi-level dropdowns
                ) );
                ?>
            </ul>
        </nav>
    </div>
</header>

