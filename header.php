<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="container">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <nav class="site-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary', // Make sure this matches the registered menu
                'menu_class'     => 'primary-menu',
                'container'      => false,
            ) );
            ?>
        </nav>
    </div>
</header>

<?php // Ensure to include the rest of your page content and footer ?>
