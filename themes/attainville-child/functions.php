<?php
// Ajout du support pour le thème enfant
function attainville_child_theme_setup() {
    // Charger les styles du thème parent et du thème enfant
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}
add_action('wp_enqueue_scripts', 'attainville_child_theme_setup');