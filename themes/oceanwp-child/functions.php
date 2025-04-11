<?php
// ==============================================
// Enqueue des styles (parent + enfant + compilé depuis Sass)
// ==============================================
function oceanwp_child_enqueue_styles() {
    // Style du thème parent
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

    // Style du thème enfant (généré depuis Sass)
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/sass/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_styles' );


// ==============================================
// Déclaration des menus
// ==============================================
function oceanwp_child_register_menus() {
    register_nav_menus( array(
        'primary' => __( 'Menu principal', 'oceanwp-child' ),
    ) );
}
add_action( 'after_setup_theme', 'oceanwp_child_register_menus' );


// ==============================================
// Enqueue des scripts (Swiper, script personnalisé)
// ==============================================
function theme_enqueue_scripts() {
    // Swiper JS + CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), null, true);

    // Ton script personnalisé
    wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/script.js', array('swiper-js'), false, true);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');


// ==============================================
// Enqueue des polices et des styles supplémentaires (FontAwesome)
// ==============================================
function oceanwp_child_enqueue_fonts() {
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_fonts');