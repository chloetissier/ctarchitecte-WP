<?php
/**
 * Functions for CT Architecte Theme
 */

// Charger les styles du thème parent
function ct_architecte_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'ct_architecte_enqueue_styles');

// Enregistrer le modèle de page personnalisé
function ct_architecte_register_templates($templates) {
    $templates['template-accueil.php'] = 'Page Accueil CT';
    return $templates;
}
add_filter('theme_page_templates', 'ct_architecte_register_templates');
