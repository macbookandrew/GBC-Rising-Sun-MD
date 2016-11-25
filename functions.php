<?php
// use minified CSS and dequeue 2013 default fonts
function add_custom_css() {
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/style.min.css' );
    wp_dequeue_style( 'twentythirteen-style' );
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' );


    // fonts
    wp_dequeue_style( 'twentythirteen-fonts' );
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false ); // dependency workaround from https://gist.github.com/thetrickster/8946567
    wp_dequeue_style( 'bitter' );
}
add_action( 'wp_print_styles', 'add_custom_css' );

// include branding
include('functions-branding.php');

// remove support for customizable header
function remove_custom_header() {
    remove_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', 'remove_custom_header', 12 );
