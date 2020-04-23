<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {

  $parent_style = 'parent-style';

  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/dist/styles/main.css' );
  wp_enqueue_style( 'child-style',
    get_stylesheet_directory_uri() . '/dist/styles/main.css',
    array( $parent_style ),
    wp_get_theme()->get('Version')
  );
}