<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <nav>
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container' => false
                ) );
            ?>
        </nav>
        <!-- Barre de recherche -->
        <div class="search-container">
            <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <input type="text" class="search-field" placeholder="Que recherchez-vous?" value="<?php echo get_search_query(); ?>" name="s" />
                <button type="submit" class="search-submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
    </header>