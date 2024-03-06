<?php
/*
/ Enqueue Parent Styles
*/
add_action( 'wp_enqueue_scripts', 'logisfare_child_enqueue_theme_styles', 11);
function logisfare_child_enqueue_theme_styles() {
    wp_register_style( 'logisfare-child-style', get_stylesheet_directory_uri() . '/style.css'  );
    wp_enqueue_style( 'logisfare-child-style' );
}