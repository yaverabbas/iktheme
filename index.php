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
    <h1><?php bloginfo( 'name' ); ?></h1>
    <p><?php bloginfo( 'description' ); ?></p>
    <nav class="primary-menu">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
</header>

<div class="container" id="content">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_title( '<h2>', '</h2>' );
            the_content();
        endwhile;
    else :
        echo '<p>No posts found.</p>';
    endif;
    ?>
</div>

<footer class="site-footer">
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
