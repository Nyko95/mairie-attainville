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

// ==============================================
// Déclaration du CPT "rendez-vous"
// ==============================================
function custom_post_type_rendez_vous() {
    $labels = array(
        'name'               => 'Rendez-vous',
        'singular_name'      => 'Rendez-vous',
        'menu_name'          => 'Rendez-vous',
        'name_admin_bar'     => 'Rendez-vous',
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter un rendez-vous',
        'new_item'           => 'Nouveau rendez-vous',
        'edit_item'          => 'Modifier le rendez-vous',
        'view_item'          => 'Voir le rendez-vous',
        'all_items'          => 'Tous les rendez-vous',
        'search_items'       => 'Rechercher un rendez-vous',
        'not_found'          => 'Aucun rendez-vous trouvé',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array('slug' => 'evenements'),
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('rendez-vous', $args);
}
add_action('init', 'custom_post_type_rendez_vous');

function create_post_type_rendez_vous() {
    $args = array(
        'labels' => array(
            'name' => 'Rendez-vous',
            'singular_name' => 'Rendez-vous',
        ),
        'public' => true,
        'has_archive' => true,  // Permet l'archive pour le CPT
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'evenements'),  // Slug de l'archive
        'show_in_rest' => true,  // Pour l'intégration avec l'éditeur Gutenberg
    );
    register_post_type('rendez-vous', $args);
}

add_action('init', 'create_post_type_rendez_vous');