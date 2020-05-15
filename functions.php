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
  wp_dequeue_style( 'sage/main.css-css' ); // PREVENT DOUBLE CALL FROM PARENT
}

function child_blocks() {
    wp_enqueue_script(
        'child-blocks',
        get_stylesheet_directory_uri() . '/dist/scripts/blocks.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
    );
}
add_action( 'enqueue_block_editor_assets', 'child_blocks' );
