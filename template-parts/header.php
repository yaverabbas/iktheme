<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <nav class="primary-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary-menu',
            'container'      => 'ul',
            'menu_class'     => 'nav-menu',
            'fallback_cb'    => false,
        ) );
        ?>
    </nav>

    <div class="container">
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <nav class="site-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_class'     => 'primary-menu',
                'container'      => false,
            ) );
            ?>
        </nav>
    </div>
</header>
